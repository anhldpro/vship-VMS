<?php

namespace App\Http\Controllers\BookTicket;

use Illuminate\Http\Request;
use Illuminate\Http\Request\CheckTicketRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\BookTicket;
use DB;
use Log;
use Validator;
use Response;
use View;
use Mail;
use App\Models\Place;
use App\Models\News;
use App\Models\TicketInformation;
use App\Models\CarCompany;
use App\Models\Itinerary;
use App\Models\ConfigViewBlade;
use App\Models\Rating;
use App\Models\Station;
use Session;
use App;

class BookTicketController extends Controller
{


    public function admin_index()
    {
        $data = BookTicket::orderBy('created_at', 'DESC')->paginate(6);
        return view('admin.bookTicket.index', [
            'data' => $data
        ]);
    }


    public function admin_create()
    {
        $itinerary = Itinerary::all();

        $this->viewData = array(
            'itinerary' => $itinerary
        );

        return view('admin.bookTicket.create', $this->viewData);
    }


    public function find_car(Request $request)
    {

        if ($request->ajax()) {
            $itinerary = $request->value;
            $total = TicketInformation::where('itinerary_id', $itinerary)->get();
            // foreach ($total as $key => $data) {
            //   $car_cpn = $data->car_id;
            // }
            return response()->json($total);
        }
    }


    public function edit($id)
    {
        $data = BookTicket::find($id);
        // dd($data);
        return view('admin.bookTicket.edit', [
            'data' => $data
        ]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        try {
            $datas = BookTicket::where('id', $id)->first();
            $datas->update($data);

            Session::flash('success', 'Sửa thành công!!!');
            return redirect(route('admin.listBookTicket.index'));
        } catch (\Exception $e) {
            \Log::info($e->getMessage());

            // something went wrong
            //
        }
    }

    public function show($id)
    {
        $data = BookTicket::find($id);
        return view('admin.bookTicket.show', [
            'data' => $data
        ]);
    }

    public function destroy($id)
    {

        DB::beginTransaction();
        try {
            BookTicket::find($id)->delete();
            DB::commit();
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công!!!'
            ], 200);

        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            DB::rollback();
            return response()->json([
                'error' => true,
                'message' => 'Internal Server Error'
            ], 500);
        }
    }

    public function admin_search(Request $request)
    {
        $keyword = $request->input('keyword');
        $datas = BookTicket::where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('email', 'LIKE', '%' . $keyword . '%')
            ->orWhere('phone', 'LIKE', '%' . $keyword . '%')
            ->paginate(6);
        $view = view('admin.bookTicket.data', [
            'datas' => $datas,
        ])->render();
        return response($view);
    }

    //--------------------------------END ADMIN --------------------------------------
    public function list_all()
    {
        $place = Place::all();
        $date_start = date("d/m/Y");
        $data = TicketInformation::all();
        $car_company = CarCompany::all();
        $station = Station::orderBy('id', 'DESC')->paginate(8);
        // $itinerary_id = $data['itinerary_id'];
        foreach ($data as $key => $datas) {
            $itinerary_id = $datas['itinerary_id'];
        }
        //Rating
        $data_rating = Rating::where('itinerary_id', $itinerary_id)->get();

        foreach ($data as $key => $value) {
            $value->rating = DB::table('rating')
                ->selectRaw('count(car_id) as count,sum(overall_rating) as overall,sum(quality_rating) as quality,sum(intime_rating) as intime,sum(service_rating) as service')
                ->where('car_id', $value->car_id)
                ->first();
        }
        $this->viewData = array(
            'data' => $data,
            'car_company' => $car_company,
            'station' => $station,
            'date_start' => $date_start,
            'place' => $place
        );
        return view('BookTicket.viewAll', $this->viewData);
    }


    public function create()
    {
        $place = Place::all();
        $car_company = CarCompany::all();
        // dd($car_company);
        $locale = App::getLocale();
        $news = News::where('Lang', $locale)->orderBy('created_at', 'DESC')->paginate(4);
        $station = Station::orderBy('id', 'DESC')->paginate(8);
        // dd($station);
        $hanoi = Itinerary::where('departPlace', 'Hà Nội')->paginate(10);
        $danang = Itinerary::where('departPlace', 'Đà Nẵng')->paginate(10);
        // dd($hanoi);
        $haiphong = Itinerary::where('departPlace', 'Hải Phòng')->paginate(10);
        $saigon = Itinerary::where('departPlace', 'Sài Gòn')->paginate(10);
        $nhatrang = Itinerary::where('departPlace', 'Nha Trang')->paginate(10);
        $quangninh = Itinerary::where('departPlace', 'Quảng Ninh')->paginate(10);

        $this->viewData = array(
            'place' => $place,
            'hanoi' => $hanoi,
            'haiphong' => $haiphong,
            'saigon' => $saigon,
            'nhatrang' => $nhatrang,
            'quangninh' => $quangninh,
            'danang' => $danang,
            'news' => $news,
            'car_company' => $car_company,
            'station' => $station
        );
        return view(' BookTicket.home', $this->viewData);
    }

    public function store(Request $request)
    {
        // $footer = ConfigViewBlade::all();
        $place = Place::all();
        $data = $request->all();
        $station = Station::orderBy('id', 'DESC')->paginate(8);
        $car_company = CarCompany::all();
        try {
            unset($data['_token']);

            $rules = [
                'date_start' => 'required',
                'departPlace' => 'required',
                'destination' => 'required',
            ];

            $messages = [
                'date_start.required' => 'Vui lòng chọn ngày!!!',
                'departPlace.required' => 'Vui lòng nhập nơi khởi hành!!!',
                'destination.required' => 'Vui lòng nhập nơi đến!!!',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                // echo "ok";die;
                return redirect()->back()->withInput($data)->withErrors($validator);

            } else {
                $date_start = $data['date_start'];
                $date_back = $data['date_back'];
                $departPlace = $data['departPlace'];
                $destination = $data['destination'];
                $datas = Itinerary::where('departPlace', $departPlace)->where('destination', $destination)->first();
                if ($date_back == NULL) {
                    $ticket_fare = $datas['ticket_fare'];
                } else {
                    $ticket_fare = $datas['ticket_fare'] * 2;
                }
                $itinerary_id = $datas['id'];

                $itinerary = TicketInformation::where('itinerary_id', $itinerary_id)->get();
                //Rating
                $data_rating = Rating::where('itinerary_id', $itinerary_id)->get();

                foreach ($itinerary as $key => $value) {
                    $value->rating = DB::table('rating')
                        ->selectRaw('count(car_id) as count,sum(overall_rating) as overall,sum(quality_rating) as quality,sum(intime_rating) as intime,sum(service_rating) as service')
                        ->where('car_id', $value->car_id)
                        ->where('itinerary_id', $value->itinerary_id)
                        ->first();
                }
                // dd((integer)floor(($itinerary[0]->rating->overall+$itinerary[0]->rating->quality+$itinerary[0]->rating->intime+$itinerary[0]->rating->service)/16));

                $this->viewData = array(
                    'itinerary' => $itinerary,
                    'date_start' => $date_start,
                    'date_back' => $date_back,
                    'departPlace' => $departPlace,
                    'destination' => $destination,
                    'place' => $place,
                    'car_company' => $car_company,
                    'station' => $station,
                    'ticket_fare' => $ticket_fare
                );
                return view('BookTicket.viewListTicket', $this->viewData);
            }

        } catch (\Exception $e) {
            \Log::info($e->getMessage());
        }

    }

    // post xu ly mua ve postCheckout/ getCheck
    public function postCheckout(Request $request)
    {
        $footer = ConfigViewBlade::all();
        $data = $request->all();
        $sum_price = $data['price_one'] * $data['numberTicket'];
        if ($data['date_back'] == NULL) {
            $ticket_type = 1;
        } else {
            $ticket_type = 2;
        }
        $email = $data['email'];

        $bookTicket = new BookTicket;
        $bookTicket->car_id = $data['car_id'];
        $bookTicket->itinerary_id = $data['itinerary_id'];
        $bookTicket->date_start = $data['date_start'];
        $bookTicket->time_start = $data['time_start'];
        $bookTicket->date_back = $data['date_back'];
        $bookTicket->time_back = $data['time_back'];
        $bookTicket->name = $data['name'];
        $bookTicket->email = $email;
        $bookTicket->phone = $data['phone'];
        $bookTicket->code = strtoupper(str_random(8));;
        $bookTicket->number_of_ticket = $data['numberTicket'];
        $bookTicket->sum_price = $sum_price;
        $bookTicket->ticket_type = $ticket_type;

        if ($bookTicket->save()) {
            $datas = BookTicket::find($bookTicket->id);
            $this->viewData = array(
                'datas' => $datas,
                'email' => $email,
            );
            // Mail::send('BookTicket.mail', function ($message) use ($email)
            //   {
            //   $message->from('tranmaianhnd@gmail.com', 'Tapxi');
            //   $message->to($email, 'tranmaianhnd@gmail.com');
            //  $message->subject('Tapxi');
            //  });

            return redirect("/checkout/" . $bookTicket->id);
        } else {
            return redirect()->back();
        }

    }

    public function getCheckout($voice_id)
    {
        $datas = BookTicket::find($voice_id);
        $this->viewData = array(
            'datas' => $datas
        );
        return view('BookTicket.viewTicket', $this->viewData);
    }

    public function find_history()
    {
        $station = Station::orderBy('id', 'DESC')->paginate(8);

        $car_company = CarCompany::all();

        $this->viewData = array(

            'car_company' => $car_company,

            'station' => $station,
        );
        return view('BookTicket.findHistory', $this->viewData);
    }


    public function history(Request $request)
    {
        $data = $request->all();

        $phone = $data['phone'];
        try {

            $rules = [
                'phone' => 'required|min:9|numeric',
                'g-recaptcha-response' => 'required|recaptcha',
            ];

            $messages = [
                'phone.required' => 'Vui lòng nhập số điện thoại!!!',
                'phone.min' => 'Số điện thoại phải có ít nhất 9 chữ số!!!',
                'phone.numeric' => 'Dữ liệu nhập vào phải là kiểu số!!!',
                'g-recaptcha-response.required' => 'Vui lòng chọn',
                'g-recaptcha-response.recaptcha' => 'Chọn nếu bạn ko phải người máy',

            ];
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withInput($data)->withErrors($validator);

            } else {
                $history = BookTicket::where('phone', $phone)->get();

                $this->viewData = array(
                    'history' => $history,
                );
                return view('BookTicket.history', $this->viewData);
            }
        } catch (Exception $e) {
            Log::info('Can not find');
            response()->json([
                'error' => true,
                'message' => 'Internal Server Error'
            ], 500);
        }
    }


    public function checkTicket()
    {
        $car_company = CarCompany::all();
        $station = Station::orderBy('id', 'DESC')->paginate(8);
        $this->viewData = array(
            'station' => $station,
            'car_company' => $car_company
        );
        return view('BookTicket.checkTicket', $this->viewData);
    }

    public function checkedTicket(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        try {
            $this->validate($request, [
                'code' => 'required',
                'g-recaptcha-response' => 'required|recaptcha',
            ], [
                'code.required' => 'Vui lòng nhập code',
                'g-recaptcha-response.required' => 'Vui lòng chọn',
                'g-recaptcha-response.recaptcha' => 'Chọn nếu bạn ko phải người máy',

            ]);
            $code = $data['code'];

            $check = BookTicket::where('code', $code)->first();

            $status = $check['status'];

            if (!$check) {

                Session::flash('success', 'Mã vé sai');

                return redirect(route('ticket.checkTicket'));

            } else if ($status == 1 || $status = 2) {

                Session::flash('success', 'Mã vé đúng');

                return redirect(route('ticket.checkTicket'));

            } else {

                Session::flash('success', 'Mã vé đã được sử dụng');

                return redirect(route('ticket.checkTicket'));
            }

        } catch (Exception $e) {
            Log::info('Can not create');
            response()->json([
                'error' => true,
                'message' => 'Internal Server Error'
            ], 500);
        }
    }


    public function cancelTicket()
    {
        $station = Station::orderBy('id', 'DESC')->paginate(8);
        $car_company = CarCompany::all();
        $this->viewData = array(
            'station' => $station,
            'car_company' => $car_company
        );
        return view('BookTicket.cancelTicket', $this->viewData);
    }


    public function canceledTicket(Request $request)
    {
        $data = $request->all();
        //var_dump($data); die();
        DB::beginTransaction();

        try {
            $this->validate($request, [
                'code' => 'required',
                'g-recaptcha-response' => 'required|recaptcha',
            ], [
                'code.required' => 'Vui lòng nhập code',
                'g-recaptcha-response.required' => 'Vui lòng chọn',
                'g-recaptcha-response.recaptcha' => 'Chọn nếu bạn ko phải người máy',
            ]);

            $code = $data['code'];
            $datas = BookTicket::where('code', $code)->first();

            if (!$datas) {
                Session::flash('success', 'Mã vé sai');
                return redirect(route('ticket.cancelTicket'));

            } else {
                $status = BookTicket::where('code', $code)
                    ->update(array('status' => 0));

                DB::commit();

                Session::flash('success', 'Hủy vé thành công');

                return redirect(route('ticket.cancelTicket'));
            }

        } catch (Exception $e) {
            Log::info('Can not create');
            DB::rollback();
            response()->json([
                'error' => true,
                'message' => 'Internal Server Error'
            ], 500);
        }
    }

    public function rate($car_id = -1, $itinerary_id = -1)
    {
        $car = CarCompany::where('id', $car_id)->get()->toArray();
        $itinerary = Itinerary::where('id', $itinerary_id)->get()->toArray();
        return [$car, $itinerary];
    }

    public function send_rating(Request $request, $car_id = -1, $itinerary_id = -1)
    {
        $data = $request->all();
        $date = date_create($request->departDate);
        $data['departDate'] = $date;
        $data['car_id'] = $car_id;
        $data['itinerary_id'] = $itinerary_id;
        $rate = Rating::create($data);
        return 1;
    }

    public function search(Request $request)
    {
        $station = Station::orderBy('id', 'DESC')->paginate(8);
        $place = Place::all();
        $car_company = CarCompany::all();
        $departPlace = $request['departPlace'];
        $destination = $request['destination'];
        $date_start = $request->input('date_start');
        $datas = Itinerary::where('departPlace', $departPlace)->where('destination', $destination)->first();

        $itinerary_id = $datas['id'];

        $itinerary = TicketInformation::where('itinerary_id', $itinerary_id)->get();
        // dd($itinerary);
        $data_rating = Rating::where('itinerary_id', $itinerary_id)->get();

        foreach ($itinerary as $key => $value) {
            $value->rating = DB::table('rating')
                ->selectRaw('count(car_id) as count,sum(overall_rating) as overall,sum(quality_rating) as quality,sum(intime_rating) as intime,sum(service_rating) as service')
                ->where('car_id', $value->car_id)
                ->first();
        }
        $this->viewData = array(
            'itinerary' => $itinerary,
            'date_start' => $date_start,
            'departPlace' => $departPlace,
            'destination' => $destination,
            'place' => $place,
            'car_company' => $car_company,
            'station' => $station
        );
        $view = view('BookTicket.demo', $this->viewData)->render();
        return response($view);
    }
}


