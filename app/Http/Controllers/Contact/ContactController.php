<?php

namespace App\Http\Controllers\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use View;
use App\Models\CarCompany;
use App\Models\Station;
use App\Models\Contact;
use Session;
use Mail;
class ContactController extends Controller
{
    //---------------------------------------------------ConTact Car-----------------------------------------------
    public function contact_ajax($id)
    { 
       $data = DB::table('ticket_informations')
                    ->join('car_companies','car_companies.id','=','ticket_informations.car_id')
                    ->join('itineraries','itineraries.id','=','ticket_informations.itinerary_id')
                    ->select('ticket_informations.id','ticket_informations.car_id','car_companies.name','itineraries.slug')
                    ->where('ticket_informations.car_id',$id)
                    ->orderBy('id','asc')
                    ->get();
           foreach ($data as  $cc) {
                echo "<option value='".$cc->id."'>".$cc->slug."</option>";
                
           }
    }
    public function contact_index(Request $request)
    {
    	$cycle = DB::table('car_companies')->get();
      $car_company = CarCompany::all();
      $station = Station::all();
       $this->viewData = array(
          'cycle' => $cycle,
          'car_company' => $car_company,
          'station' => $station
        );
        return view('BookTicket.contactCar', $this->viewData);
    }
    public function contact_post(Request $request)
    {
        // dd($request->all());
      	$validator = Validator::make($request->all(),
              [
                'name_'=>'required',
               'phone_'=>'required',
                'email_' =>'required|email',
              ],
              [
                'name_.required'=>'Vui lòng điền tên của bạn',
                'phone_.required'=>"Vui lòng điền số điện thoại của bạn",
                'email_.email'=>"Không đúng định dạng email",
                'email_.required' =>"Vui lòng điền email"
              ]
             );
      	
      	if($validator->fails()){
           return redirect('contactCar')
           ->withErrors($validator)
           ->withInput();
       }else{

          $data =[
            'fullname' => $request->get('name_'),
            'phonenumber' => $request->get('phone_'),
            'email' => $request->get('email_'),
            'car_id' =>$request->get('car_name'),
            'itinerary_id' =>$request->get('select')
          ];
            if ($request->get('select')=='') {
                return \Redirect::back()->withInput()->with('responseData', array('statusCode' => 2, 'message' => 'Bạn chưa chọn tuyến đường cụ thể'));
            }
            if(DB::table('contact_car_companies')->insert($data))
            {
              return \Redirect::back()->with('responseData', array('statusCode' => 1, 'message' => 'Cảm ơn quý khách đã gửi thông tin cho nhà xe . Chúng tôi sẽ liên hệ với quý khách trong thời gian sớm nhất .'));
           }else{
              return \Redirect::back()->withInput()->with('responseData', array('statusCode' => 2, 'message' => 'Có lỗi xảy ra, vui lòng thử lại'));
            }
        }
    }
  // ---------------------------------------------------Contac us-----------------------------------------------------------
  public function create()
  {    
    $car_company = CarCompany::all();
    $station = Station::all();
    $this->viewData = array(
      'car_company' => $car_company,
      'station'     => $station
      );
    return view('BookTicket.contact', $this->viewData);
  }


  public function store(Request $request){
    $data = $request->all();
    try
        {
          $rules = [
            'name'               =>'required',
            'email'              =>'required',
            'phone'              =>'required',
                  
          ];

          $messages = [
            'name.required'      =>'Vui lòng nhập tên!!',
            'phone.required'      =>'Vui lòng nhập số điện thoại!!',
            'email.required'      =>'Vui lòng nhập email!!',
                                  
          ];

          $validator = Validator::make( $request->all(), $rules, $messages);

          if ( $validator->fails() ){

              return redirect()->back()->withInput($data)->withErrors($validator);
          
          }else{
          
            $data = $request->all();
            $data[ 'name' ] = $data[ 'name' ];
            $datas= Contact::create( $data );
            $email = $datas['email'];
            $this ->viewData = array(
            'datas' => $datas,
            'email'      => $email,
            );  
          // Mail::send( 'email.mail', $this->viewData,function( $msg ) use( $email ){
          // $msg->from( 'vietnt.hn@gmail.com','Tuấn Việt' );
          // $msg->to( $email )->subject( 'Thông Tin Liên Hệ' );
          // });           
          // echo "ok";die;

          Session::flash( 'success', 'Gửi thông tin liên hệ thành công !!!!!');

          return redirect()->back();
          }
      }
      catch (\Exception $e) {
                \Log::info($e->getMessage());
                DB::rollback();
                            // something went wrong
                            // 
        } 
  }
}
