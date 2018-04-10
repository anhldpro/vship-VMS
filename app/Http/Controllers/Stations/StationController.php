<?php

namespace App\Http\Controllers\Stations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Station;
use App\Models\Place;
use App\Models\ImagesFiles;
use App\Models\Itinerary;
use DB;
use Session;
use Validator;
use View;
use File;


class StationController extends Controller
{
    //
    public function admin_index()
    {
      $data = Station::orderBy( 'created_at','DESC' )->paginate(6);

       
      return view('admin.stations.index',compact('data'));
    }
     public function create()
    {  
        $last_record =Station::max('id');
        $place = Place::all();
        $this->viewData = array(
          'place' => $place
          );
        return view('admin.stations.create', $this->viewData);
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
        'place_id'             => 'required',    
        ];
        $messages = [
        'name.required'        =>'Vui lòng nhập tên nhà xe!!!',
        'phone.required'       =>'Vui lòng nhập số điện thoại nhà xe!!!',
        'email.required'       =>'Vui lòng nhập email!!!',
        'place_id.required'    =>'Vui lòng chọn tỉnh, thành phố!!!',                                
        ];
        $_token = $data['_token'];
        $temp_folder = 'stationImages/temp/'.$_token.'/';
        $validator = Validator::make( $request->all(), $rules, $messages);

        if ( $validator->fails() ){
          return redirect()->back()->withInput($data)->withErrors($validator);
        }else{
          $avatar = $data['avatar'];
          $name_img = $avatar->getClientOriginalName();
          $data['avatar']= $request->file( 'avatar' )->storeAs( 'images/stations',$name_img.'.jpg' );
          $station = Station::create( $data );
          $id = DB::getPdo()->lastInsertId();
          //save image
          $_token = $data['_token'];
          $temp_folder = 'stationImages/temp/'.$_token.'/';
          $real_folder = 'images/stations/';
          $img_info = (isset($data['img_info']))?$data['img_info']:[];
          unset($data['img_info']);
          unset($data['_token']);
          foreach ($img_info as $key => $value) {
            if ($value != '' || $value != null) {
              if (file_exists ($temp_folder.$value)) {
                rename($temp_folder.$value, $real_folder.$value);
                DB::table('images')->insert([
                   'type'         => 1,
                   'content_id'   => $id,
                   'url'          => $real_folder.$value,
                   ]);
              }
            }
          }

          array_map('unlink', glob($temp_folder.'*'));
          $remove_temp_folder = is_dir($temp_folder)?rmdir($temp_folder):'';
          $save = Station::where('id', $id)->first();       
          Session::flash( 'success', 'Thêm mới thành công !!!!!');

          return redirect( route( 'admin.station.index' ) );
        }
      }catch (Exception $e) {
        \Log::info($e->getMessage());
      }
    }

      public function removeImage(Request $request){
         $id = $request->id;
         $name = $request->name;
         $temp_folder = 'stationImages/temp/'.$request->_token.'/';
         $real_folder = 'images/stations/';
         $data = DB::table('images')
            ->where('url',$real_folder.$name)->get();
         if(count($data) != 0){
            return 1;
         }
         unlink($temp_folder.$name);
         return -1;
   }

  
    public function destroy(Request $request){
         DB::beginTransaction();
        try {
            Station::find( $request->id )->delete();
            DB::commit();
            return response()->json([
                    'error' => false,
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
    public function edit($id)
    {   
      $place = Place::all();  
      $data = Station::find( $id );
      // dd($data);
      return view( 'admin.stations.edit',[
        'data' => $data,
        'place' => $place
        ] );
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
      ->where('type',1)
      ->get();
      return $data;
   }

 
    public function update(Request $request,$id)
    {
        $data = $request->all();
          if(!$request->hasFile('avatar')){
             $_token = $data['_token'];
             $temp_folder = 'stationImages/temp/'.$_token.'/';
             $real_folder = 'images/stations/';
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
                         'type'         => 1,
                         'content_id'   => $id,
                         'url'          => $real_folder.$value,
                         ]);
                   }
                }
             }
             array_map('unlink', glob($temp_folder.'*'));
             $remove_temp_folder = is_dir($temp_folder)?rmdir($temp_folder):'';
             $save = Station::where('id', $id)->first();           
             $save->update($data);
             Session::flash( 'success', 'Sửa Thành Công!!!' );
             return redirect( route( 'admin.station.index' ) );       
           }else{
            $avatar = $data['avatar'];

            $name_img = $avatar->getClientOriginalName();

            $data['avatar']= $request->file( 'avatar' )->storeAs( 'images/stations',$name_img.'.jpg' );

             $_token = $data['_token'];
             $temp_folder = 'stationImages/temp/'.$_token.'/';
             $real_folder = 'images/stations/';
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
                         'type'         => 1,
                         'content_id'   => $id,
                         'url'          => $real_folder.$value,
                         ]);
                   }
                }
             }
             array_map('unlink', glob($temp_folder.'*'));
             $remove_temp_folder = is_dir($temp_folder)?rmdir($temp_folder):'';
             $save = Station::where('id', $id)->first();           
             $save->update($data);
             Session::flash( 'success', 'Sửa Thành Công!!!' );
             return redirect( route( 'admin.station.index' ) );    

          }     
    }
    public function show($id){
          $data = Station::find( $id );
      return view( 'admin.stations.show',[
        'data' => $data 
        ] );
    }
    public function index($id){
        $img = Station::with('images')->find($id)->toArray();
        
        $viewdata['img'] = $img;

        // end slide  images
         $car = Station::with('car_company')->find($id);
       // dd($car['car_company']);
        $path = Station::with('itinerary')->find($id);
      

        foreach ($path['itinerary'] as $key => $value) {
            # code...
                $path['itinerary'][$key]['slg'] = $path->name." "."đi"." ".$value['destination'];
          
        }
        foreach ($car['car_company'] as $key => $value) {
             $path['itinerary'][$key]['brand'] = $value->name;
        }
        $viewdata['path'] = $path['itinerary'];

        return view('BookTicket.station')->with('viewdata',$viewdata);

    }
     public function station_post(Request $request)
    {
        $data = $request->all();
    DB::beginTransaction();
      try{
        unset( $data[ '_token' ] );
        $date_start  = $data[ 'date_start' ];
        $departPlace = $data[ 'departPlace' ];
        $destination = $data[ 'destination' ];
          $rules = [
            'date_start'               =>'required',
            'departPlace'               =>'required',
            'destination'               =>'required',
          ];

          $messages = [
            'date_start.required'      =>'Vui lòng chọn ngày!!!',                                 
            'departPlace.required'      =>'Vui lòng nhập nơi khởi hành!!!',                                 
            'destination.required'      =>'Vui lòng nhập nơi đến!!!',                                 
             ];
              $validator = Validator::make( $request->all(), $rules, $messages);

          if ( $validator->fails() ){
            return redirect()->back()->withInput($data)->withErrors($validator);
      
            } else {

          $datas = Itinerary::where( 'departPlace', $departPlace )->where( 'destination', $destination )->first();

              $itinerary_id = $datas[ 'id' ];
            
              $itinerary =  TicketInformation::where( 'itinerary_id', $itinerary_id )->get();

           return view('BookTicket.viewListTicket')->with([
                'itinerary' => $itinerary,
                'date_start' => $date_start,
                'departPlace' => $departPlace,
                'destination' => $destination,
            ]);
            }

          }catch (\Exception $e) {
                \Log::info($e->getMessage());
      }
    }
   public function search(Request $request) {
      $keyword = $request->input('keyword');
      $datas = Station::where('name', 'LIKE', '%'.$keyword.'%')->paginate(6);
      $view  = view('admin.stations.data',[
        'datas' => $datas,
      ])->render();
      return response($view);
    }
}
