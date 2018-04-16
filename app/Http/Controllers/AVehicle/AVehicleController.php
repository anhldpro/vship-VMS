<?php

namespace App\Http\Controllers\AVehicle;

use App\Models\AVehicleRoad;
use App\Models\CatPlace;
use App\Models\CatVehicle;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Log;
use Illuminate\Support\Facades\Validator as Validator;
use App\Models\AVehicle;
use Response;
use View;
use Session;
use Input;
use App\Models\ImagesFiles;
use App\Models\Station;
use App\Models\Rating;
use App\Models\Place;
use App\Models\Itinerary;
use File;

class AVehicleController extends Controller
{
    public function index()
    {
        $vehicles = AVehicle::orderBy('created_at', 'DESC')->paginate(6);
        $this->viewData = array(
            'vehicles' => $vehicles
        );
        return view('vms.vehicle.index', $this->viewData);
    }


    public function create()
    {

        //get cat veh
        $catVeh = new CatVehicle();
        $vehicles = $catVeh->getListActive();

        //get cat package

        //get province
        $catPlace = new CatPlace();
        $provinces = $catPlace->getVnProvince();


        $this->viewData = array(
            'vehicles' => $vehicles,
            'provinces' => $provinces
        );

        return view('vms.vehicle.create', $this->viewData);
    }


    public function store(Request $request)
    {

        $data = $request->all();
//        dd($data);
        try {
            $rules = [
                'cat_veh' => 'required',
                'cat_province_from' => 'required',
                'cat_province_to' => 'required'
            ];
            $messages = [
                'cat_veh.required' => 'Vui lòng chọn loại xe!!!',
                'cat_province_from.required' => 'Vui lòng chọn điểm khởi hành!!!',
                'cat_province_to.required' => 'Vui lòng chọn điểm đến!!!'
            ];
            /*
                $validate= Validator::make(
                $request->all(),
                [
                    'title' =>'required|min:5|max:255',
                    'content' =>'required',
                ],

                [
                    'required'=>':attribute Không được để trống',
                    'min'=>':attribute Không được nhỏ hơn :min',
                    'max'=>':attribute Không được lớn hơn :max',
                ],

                [
                    'title'=>'Tiêu đề',
                    'content'=>'Nội dung',
                ]

                );
                if($validate->fails()){
                    return View('ValidationView')->withErrors($validate);
                }
             * */

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => $validator->errors(),
                    'data' => $request->all()
                ], 200);
            } else {
//                dd($data);
                $avatar = $data['avatar'];
                $name_img = $avatar->getClientOriginalName();
                $data['avatar'] = $request->file('avatar')->storeAs('images/car', $name_img . '.jpg');

                /*
                 * 1. save vehicle info
                 */
                $veh = new AVehicle;
                $veh->veh_type = $data['cat_veh'];
                $veh->veh_capacity = $data['capacity'];
                $veh->desc = $data['desc'];
                $veh->avatar = $data['avatar'];
                $veh->status = 'ACTV';

                $veh->save();

//                dd($veh->id);

                /*
                 * 2. save image of vehicle
                 */
                $id = $veh->id;
                $_token = $data['_token'];
                $temp_folder = 'vship-img/temp/' . $_token . '/';
                $real_folder = 'images/car/';
                $img_info = isset($data['img_info']) ? $data['img_info'] : [];
                // dd($img_info);
                unset($data['img_info']);
                unset($data['_token']);
                foreach ($img_info as $key => $value) {
                    if ($value != '' || $value != null) {

                        if (file_exists($temp_folder . $value)) {
                            rename($temp_folder . $value, $real_folder . $value);

                            $vehImg = new Image;
                            $vehImg->type = 2;
                            $vehImg->content_id = $id;
                            $vehImg->url = $real_folder . $value;

                            $vehImg->save();

                        }
                    }
                }

                //remove temp image

                array_map('unlink', glob($temp_folder . '*'));
                $remove_temp_folder = is_dir($temp_folder) ? rmdir($temp_folder) : '';

                /*
                 * 3. Them tuyen duong (AVehicleRoad)
                 */

                $isFix = ($data['fix_road'] == true) ? 1 : 0;

                $vehRoad = new AVehicleRoad();
                $vehRoad->veh_id = $id;
                $vehRoad->from_pos = $data['cat_province_from'];
                $vehRoad->from_name = $data['cat_pro_from_name'];
                $vehRoad->to_pos = $data['cat_province_to'];
                $vehRoad->to_name = $data['cat_pro_to_name'];
                $vehRoad->status = 'ACTV';
                $vehRoad->fix_road = $isFix;

                $vehRoad->save();

                Session::flash('success', 'Thêm mới thành công !!!!!');

                return redirect(route('vms.vehicle.index'));
            }
        } catch (Exception $e) {
            \Log::info($e->getMessage());
        }
    }


    public function removeImage(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $temp_folder = 'vship-img/temp/' . $request->_token . '/';
        $real_folder = 'images/car/';
        $data = DB::table('images')
            ->where('url', $real_folder . $name)->get();
        if (count($data) != 0) {
            return 1;
        }
        unlink($temp_folder . $name);
        return -1;
    }

    public function uploadImageDz(Request $request)
    {
        //Khoi tao
        $id = $request->id;
        $type = $request->type;
        $temp_folder = public_path() . '/vship-img/temp/' . $id . '/' . $request->_token . '/';
        $file = $request->file;
        $new_name = rand(1, 1000) . time();
        $ext = $file->getClientOriginalExtension();
        $file->move($temp_folder, $new_name . '.' . $ext);

        return $new_name . '.' . $ext;
    }

    public function getImages(Request $request)
    {
        $id = $request->id;
        $image = new Image();
        return $image->getVehImgById($id);
    }

    public function edit($id)
    {
        $data = AVehicle::find($id);
        $this->viewData = array(
            'data' => $data,
        );
        return view('vms.vehicle.edit', $this->viewData);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);
        try {
            $rules = [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'address' => 'required',
            ];

            $messages = [
                'name.required' => 'Vui lòng nhập tên nhà xe!!!',
                'phone.required' => 'Vui lòng nhập số điện thoại nhà xe!!!',
                'email.required' => 'Vui lòng nhập email!!!',
                'address.required' => 'Vui lòng nhập địa chỉ!!!',

            ];

            if (!$request->hasFile('avatar')) {
                $_token = $data['_token'];
                $temp_folder = 'stationImages/temp/' . $_token . '/';
                $real_folder = 'images/car/';
                $img_remove = (isset($data['img_remove'])) ? $data['img_remove'] : [];
                $img_info = (isset($data['img_info'])) ? $data['img_info'] : [];
                unset($data['img_remove']);
                unset($data['img_info']);
                unset($data['_token']);
                foreach ($img_remove as $key => $value) {
                    if ($value != '' || $value != null) {
                        file_exists($real_folder . $value) ? unlink($real_folder . $value) : '';
                        DB::table('images')->where('url', $real_folder . $value)->delete();
                    }
                }
                foreach ($img_info as $key => $value) {
                    if ($value != '' || $value != null) {
                        if (file_exists($temp_folder . $value)) {
                            rename($temp_folder . $value, $real_folder . $value);
                            DB::table('images')->insert([
                                'type' => 2,
                                'content_id' => $id,
                                'url' => $real_folder . $value,
                            ]);
                        }
                    }
                }
                array_map('unlink', glob($temp_folder . '*'));
                $remove_temp_folder = is_dir($temp_folder) ? rmdir($temp_folder) : '';
                $save = AVehicle::where('id', $id)->first();
                $save->update($data);
                Session::flash('success', 'Sửa Thành Công!!!');
                return redirect(route('vms.vehicle.index'));
            } else {
                $avatar = $data['avatar'];

                $name_img = $avatar->getClientOriginalName();

                $data['avatar'] = $request->file('avatar')->storeAs('images/car', $name_img . '.jpg');

                $_token = $data['_token'];
                $temp_folder = 'stationImages/temp/' . $_token . '/';
                $real_folder = 'images/car/';
                $img_remove = (isset($data['img_remove'])) ? $data['img_remove'] : [];
                $img_info = (isset($data['img_info'])) ? $data['img_info'] : [];
                unset($data['img_remove']);
                unset($data['img_info']);
                unset($data['_token']);
                foreach ($img_remove as $key => $value) {
                    if ($value != '' || $value != null) {
                        file_exists($real_folder . $value) ? unlink($real_folder . $value) : '';
                        DB::table('images')->where('url', $real_folder . $value)->delete();
                    }
                }
                foreach ($img_info as $key => $value) {
                    if ($value != '' || $value != null) {
                        if (file_exists($temp_folder . $value)) {
                            rename($temp_folder . $value, $real_folder . $value);
                            DB::table('images')->insert([
                                'type' => 2,
                                'content_id' => $id,
                                'url' => $real_folder . $value,
                            ]);
                        }
                    }
                }
                array_map('unlink', glob($temp_folder . '*'));
                $remove_temp_folder = is_dir($temp_folder) ? rmdir($temp_folder) : '';
                $save = AVehicle::where('id', $id)->first();
                $save->update($data);
                Session::flash('success', 'Sửa Thành Công!!!');
                return redirect(route('vms.vehicle.index'));
            }
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            // something went wrong
            //
        }

    }

    public function show($id)
    {
        $data = AVehicle::find($id);
        // dd($data);
        $datas = ImagesFiles::where('type', '2')->where('content_id', $id)->get();
        $this->viewData = array(
            'data' => $data,
            'datas' => $datas
        );
        return view('vms.vehicle.show', $this->viewData);
    }


    public function destroy($id)
    {

        DB::beginTransaction();
        try {
            AVehicle::find($id)->delete();
            DB::commit();
            return response()->json([
                'error' => false,
                'message' => 'Delete success!!!'
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

    public function validate_phone_request(Request $request)
    {
        if ($request->ajax()) {

            $phone = $request->value;

            $total = AVehicle::where('phone', $phone)->count();

            return response()->json($total);
        }
    }

    public function validate_email_request(Request $request)
    {
        if ($request->ajax()) {

            $email = $request->value;

            $total = AVehicle::where('email', $email)->count();

            return response()->json($total);
        }
    }

    public function index_old($id)
    {
        $hanoi = Itinerary::where('departPlace', 'Hà Nội')->paginate(10);
        $danang = Itinerary::where('departPlace', 'Đà Nẵng')->paginate(10);
        $haiphong = Itinerary::where('departPlace', 'Hải Phòng')->paginate(10);
        $saigon = Itinerary::where('departPlace', 'Sài Gòn')->paginate(10);
        $nhatrang = Itinerary::where('departPlace', 'Nha Trang')->paginate(10);
        $quangninh = Itinerary::where('departPlace', 'Quảng Ninh')->paginate(10);
        $station = Station::all();
        $place = PLace::all();
        $car_company = AVehicle::all();
        $data = ImagesFiles::where('type', '2')->where('content_id', $id)->get();
        $car_cpn = AVehicle::where('id', $id)->first();
        // dd($car_company);
        //Rating
        $data_rating = Rating::where('itinerary_id', $id)->get();
        $car_cpn->rating = DB::table('rating')
            ->selectRaw('count(car_id) as count,sum(overall_rating) as overall,sum(quality_rating) as quality,sum(intime_rating) as intime,sum(service_rating) as service')
            ->where('car_id', $car_cpn->id)
            ->first();



        $this->viewData = array(
            'data' => $data,
            'car_cpn' => $car_cpn,
            'station' => $station,
            'car_company' => $car_company,
            'place' => $place,
            'hanoi' => $hanoi,
            'haiphong' => $haiphong,
            'saigon' => $saigon,
            'nhatrang' => $nhatrang,
            'quangninh' => $quangninh,
            'danang' => $danang,
        );
        return view('BookTicket.vehicle', $this->viewData);
    }


    public function search(Request $request)
    {
        $search = $request->term;

        $datas = AVehicle::select()->where("name", "LIKE", "%{$search}%")->get();

        if (!$datas->isEmpty()) {
            foreach ($datas as $data) {
                $new_row['name'] = $data->name;

                $new_row['url'] = url('admin/car_company/show', $data->id);

                $row_set[] = $new_row; //build an array
            }
        }

        echo json_encode($row_set);
    }
}
