<?php

namespace App\Http\Controllers\CarCompany;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Log;
use Illuminate\Support\Facades\Validator as Validator;
use App\Models\CarCompany;
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
class CarCompanyController extends Controller
{
	public function admin_index()
	{
		$data = CarCompany::orderBy( 'created_at','DESC' )->paginate(6);
		return view( 'admin.carCompany.index',[
			'data' => $data
			]);
	}


	public function create()
	{
		
		return view( 'admin.carCompany.create');
	}


	public function store(Request $request)
	{ 
		$data = $request->all();
		try
		{
			$rules = [
			'name'                 =>'required',
			'phone'                =>'required',
			'email'                =>'required',
			'address'              => 'required'    
			];
           	$messages = [
             'name.required'        =>'Vui lòng nhập tên nhà xe!!!',
             'phone.required'       =>'Vui lòng nhập số điện thoại nhà xe!!!',
             'email.required'       =>'Vui lòng nhập email!!!',
             'address.required'     =>'Vui lòng nhập địa chỉ!!!',
                                  
         	];

          	$validator = Validator::make( $request->all(), $rules, $messages);

          	if ( $validator->fails() ){
                return response()->json([
                    'error'      => true,
                    'message'   =>$validator->errors(),
                    'data'    => $request -> all()
                ],200);
          	}else{
                $avatar = $data['avatar'];
                $name_img = $avatar->getClientOriginalName();
                $data['avatar']= $request->file( 'avatar' )->storeAs( 'images/car',$name_img.'.jpg' );	

				$car = CarCompany::create( $data );
        		  $id = DB::getPdo()->lastInsertId();
				// dd($car_id);
						// Image
				$_token = $data['_token'];
		          $temp_folder = 'stationImages/temp/'.$_token.'/';
		          $real_folder = 'images/car/';
		          $img_info = isset($data['img_info'])?$data['img_info']:[];
		          // dd($img_info);
		          unset($data['img_info']);
		          unset($data['_token']);
		          foreach ($img_info as $key => $value) {
		            if ($value != '' || $value != null) {
		       
		              if (file_exists ($temp_folder.$value)) {
		                rename($temp_folder.$value, $real_folder.$value);
		                DB::table('images')->insert([
		                   'type'         => 2,
		                   'content_id'   => $id,
		                   'url'          => $real_folder.$value,
		                   ]);
		              }
		            }
		          }	

		          array_map('unlink', glob($temp_folder.'*'));
		          $remove_temp_folder = is_dir($temp_folder)?rmdir($temp_folder):'';
		          $save = CarCompany::where('id', $id)->first();       
		          Session::flash( 'success', 'Thêm mới thành công !!!!!');

		          return redirect( route( 'admin.car.index' ) );    
			}
		}catch (Exception $e) {
			\Log::info($e->getMessage());
		}
	}


	public function removeImage(Request $request){
         $id = $request->id;
         $name = $request->name;
         $temp_folder = 'stationImages/temp/'.$request->_token.'/';
         $real_folder = 'images/car/';
         $data = DB::table('images')
            ->where('url',$real_folder.$name)->get();
         if(count($data) != 0){
            return 1;
         }
         unlink($temp_folder.$name);
         return -1;
    }

   	public function uploadImageDz(Request $request) {
      //Khoi tao 
      $id = $request->id;
      $type = $request->type;
      $temp_folder = public_path().'/stationImages/temp/'.$id.'/'.$request->_token.'/';
      $file = $request->file;
      $new_name = rand(1,1000).time();
      $ext = $file->getClientOriginalExtension();
      $file->move($temp_folder,$new_name.'.'.$ext);

      return $new_name.'.'.$ext;
    }

   public function getImages(Request $request) {
      $id = $request->id;
      $data = DB::table('images')
      ->where('content_id',$id)
      ->where('type',2)
      ->get();
      return $data;
   }

	public function edit( $id )
	{
		$data = CarCompany::find( $id );
		$this ->viewData = array(
			'data' => $data,
			);
		return view( 'admin.carCompany.edit', $this->viewData);
	}

	public function update( Request $request, $id )
	{
		$data = $request->all();
		// dd($data);
		try
		{
			$rules = [
			'name'                =>'required',
			'phone'               =>'required',
			'email'               =>'required',
			'address'             =>'required',
			];

			$messages = [
			'name.required'       =>'Vui lòng nhập tên nhà xe!!!',
			'phone.required'      =>'Vui lòng nhập số điện thoại nhà xe!!!',
			'email.required'      =>'Vui lòng nhập email!!!',
			'address.required'    =>'Vui lòng nhập địa chỉ!!!',

			];

			if(!$request->hasFile('avatar')){
             $_token = $data['_token'];
             $temp_folder = 'stationImages/temp/'.$_token.'/';
             $real_folder = 'images/car/';
             $img_remove = (isset($data['img_remove']))?$data['img_remove']:[];
             $img_info = (isset($data['img_info']))?$data['img_info']:[];
             unset($data['img_remove']);
             unset($data['img_info']);
             unset($data['_token']);
             foreach ($img_remove as $key => $value) {
                if ($value != '' || $value != null) {
                   file_exists ( $real_folder.$value )?unlink($real_folder.$value):'';
                   DB::table('images')->where('url', $real_folder.$value)->delete();
                }
             }
             foreach ($img_info as $key => $value) {
                if ($value != '' || $value != null) {
                   if (file_exists ($temp_folder.$value)) {
                      rename($temp_folder.$value, $real_folder.$value);
                      DB::table('images')->insert([
                         'type'         => 2,
                         'content_id'   => $id,
                         'url'          => $real_folder.$value,
                         ]);
                   }
                }
             }
             array_map('unlink', glob($temp_folder.'*'));
             $remove_temp_folder = is_dir($temp_folder)?rmdir($temp_folder):'';
             $save = CarCompany::where('id', $id)->first();           
             $save->update($data);
             Session::flash( 'success', 'Sửa Thành Công!!!' );
             return redirect( route( 'admin.car.index' ) );       
           }else{
            $avatar = $data['avatar'];

            $name_img = $avatar->getClientOriginalName();

            $data['avatar']= $request->file( 'avatar' )->storeAs( 'images/car',$name_img.'.jpg' );

             $_token = $data['_token'];
             $temp_folder = 'stationImages/temp/'.$_token.'/';
             $real_folder = 'images/car/';
             $img_remove = (isset($data['img_remove']))?$data['img_remove']:[];
             $img_info = (isset($data['img_info']))?$data['img_info']:[];
             unset($data['img_remove']);
             unset($data['img_info']);
             unset($data['_token']);
             foreach ($img_remove as $key => $value) {
                if ($value != '' || $value != null) {
                   file_exists ( $real_folder.$value )?unlink($real_folder.$value):'';
                   DB::table('images')->where('url', $real_folder.$value)->delete();
                }
             }
             foreach ($img_info as $key => $value) {
                if ($value != '' || $value != null) {
                   if (file_exists ($temp_folder.$value)) {
                      rename($temp_folder.$value, $real_folder.$value);
                      DB::table('images')->insert([
                         'type'         => 2,
                         'content_id'   => $id,
                         'url'          => $real_folder.$value,
                         ]);
                   }
                }
             }
             array_map('unlink', glob($temp_folder.'*'));
             $remove_temp_folder = is_dir($temp_folder)?rmdir($temp_folder):'';
             $save = CarCompany::where('id', $id)->first();           
             $save->update($data);
             Session::flash( 'success', 'Sửa Thành Công!!!' );
             return redirect( route( 'admin.car.index' ) );    
         	}
		}catch(\Exception $e) {
			\Log::info($e->getMessage());
									 // something went wrong
									 // 
		} 
		
	}

	public function show( $id )
	{
		$data = CarCompany::find( $id );
		// dd($data);
		$datas = ImagesFiles::where('type', '2')->where('content_id', $id)->get();
		$this->viewData =  array(
			'data'  => $data,
			'datas' => $datas
			);
		return view( 'admin.carCompany.show', $this->viewData );
	}


	public function destroy($id)
	{

		DB::beginTransaction();
		try {
			CarCompany::find( $id )->delete();
			DB::commit();
			return response()->json([
				'error' => false,
				'message' => 'Delete success!!!'
				], 200);

		} catch(\Exception $e) {
			\Log::info( $e->getMessage() );
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

			$total = CarCompany::where('phone',$phone)->count();

			return response()->json($total);
		}
	}

	public function validate_email_request(Request $request)
	{
		if ($request->ajax()) {

			$email = $request->value;

			$total = CarCompany::where('email',$email)->count();

			return response()->json($total);
		}
	}

	public function index( $id )
	{ 	
		$hanoi = Itinerary::where( 'departPlace', 'Hà Nội')->paginate(10);
      $danang = Itinerary::where( 'departPlace', 'Đà Nẵng')->paginate(10);
		$haiphong = Itinerary::where( 'departPlace', 'Hải Phòng')->paginate(10);
      $saigon = Itinerary::where( 'departPlace', 'Sài Gòn')->paginate(10);
      $nhatrang = Itinerary::where( 'departPlace' ,'Nha Trang')->paginate(10);
      $quangninh = Itinerary::where( 'departPlace', 'Quảng Ninh')->paginate(10);
		$station = Station::all();
		$place = PLace::all();
		$car_company = CarCompany::all();
		$data = ImagesFiles::where('type', '2')->where('content_id', $id)->get();
		$car_cpn= CarCompany::where( 'id', $id)->first();
		// dd($car_company);
		//Rating
		$data_rating = Rating::where('itinerary_id',$id)->get();
		$car_cpn->rating = DB::table('rating')
		->selectRaw('count(car_id) as count,sum(overall_rating) as overall,sum(quality_rating) as quality,sum(intime_rating) as intime,sum(service_rating) as service')
		->where('car_id',$car_cpn->id)
		->first();
		$this->viewData = array(
			'data' => $data,
			'car_cpn' => $car_cpn,
			'station' => $station,
			'car_company' => $car_company,
			'place'    => $place,
			'hanoi' => $hanoi,
	        'haiphong' => $haiphong,
	        'saigon' => $saigon,
	        'nhatrang' =>  $nhatrang,
	        'quangninh' => $quangninh,
	        'danang' => $danang,
 			);
		return view( 'BookTicket.carCompany', $this->viewData);
	}


	public function search(Request $request)
	{
		$search=  $request->term;

		$datas = CarCompany::select()->where("name","LIKE","%{$search}%")->get();

		if(!$datas->isEmpty())
		{
			foreach($datas as $data)
			{
				$new_row['name']= $data->name;

				$new_row['url']= url('admin/car_company/show',$data->id);

					 $row_set[] = $new_row; //build an array
					}
				}

				echo json_encode($row_set);
			}       
		}
