<?php

namespace App\Http\Controllers\Itinerary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Itinerary;
use App\Models\Place;
use App\Models\Station;
use Response;
use DB;
use Log;
use Illuminate\Support\Facades\Validator as Validator;
use Session; 
class ItineraryController extends Controller
{
    public function admin_index( Request $request )
    {
    	$data = Itinerary::orderBy( 'created_at','DESC' )->paginate(6);
	    return view( 'admin.itinerary.index', [
	        'data' => $data 
      	]);
    }


    public function create()
    {	
    	$place = Place::all();
    	return view( 'admin.itinerary.create',[
    		'place' => $place
    		]);
    }


    public function store( Request $request )
    {   

        $place = Place::all();     
    	$data = $request->all();    
        unset($data[ '_token']);
        // unset($data[ 'title']);
    	try {
            $rules = [
            'departPlace' => 'required',
            'destination' => 'required',
            'ticket_fare' =>  'required',
            ];
           $messages = [
            'departPlace.required'      =>'Vui lòng chọn điểm xuất phát',
            'destination.required'      =>'Vui lòng chọn điểm đến',
            'ticket_fare.required'      =>'Vui lòng nhập giá vé',
        ];

          $validator = Validator::make( $request->all(), $rules, $messages);

          if ( $validator->fails() ){
                return redirect()->back()->withInput($data)->withErrors($validator);
          }else{
                $id1 =$data[ 'departPlace' ];

                $id2 = $data['destination'];

                $departPlace = Place::find($id1);
                
                $destination = Place::find($id2);  

                $data[ 'departPlace' ] = $departPlace['name']; 

                $data[ 'destination' ] = $destination['name'];

                $data['slug'] = $data['departPlace'].'-'.$data[ 'destination' ];

                $itinerary = Itinerary::create( $data );

                Session::flash( 'success', 'Thêm mới thành công !!!!!');

                return redirect( route( 'admin.itinerary.index' ) );
          }
    	} catch (Exception $e) {
    		\Log::info($e->getMessage());
                DB::rollback();
                            // something went wrong
                            // 
    	}
    }
    public function store2( Request $request )
    {   
           
        $data = $request->all();
    
        $data['departPlace'] = Place::find($data['departPlace'])->name;
                
        $data['destination'] = Place::find($data['destination'])->name;  

        $data['slug'] = $data['departPlace'].'-'.$data[ 'destination' ];

        $itinerary_id = Itinerary::create($data);

        $data['itinerary_id'] = $itinerary_id->id;
        
        return Response::json($data);
    }

    public function edit( $id )
    { 
    	$data = Itinerary::find( $id );
        // dd($data);
        $departPlace = Place::where('name',$data['departPlace'])->first();
        $destination = Place::where('name',$data['destination'])->first();
        // $datass = $data[]
        $place = Place::all();
        $station_dps = Place::with('stations')->find($departPlace['id'])->toArray();
        $station_dess = Place::with('stations')->find($destination['id'])->toArray();
        $station_dp= $station_dps['stations'];
        $station_des = $station_dess['stations'];
    	return view ( 'admin.itinerary.edit', [
    		'data' => $data,
            'station_dp' => $station_dp,
            'station_des' => $station_des,
            'place' => $place
    		] );
    }



    public function update( Request $request, $id)
    {
    	$data = $request->all();
        
        if(!$data['station_id_dp']){
           $data['station_id_dp']==NULL;     
        }
        if(!$data['station_id_des']){
           $data['station_id_des']==NULL;     
        }
    	try {
    		$this->validate( $request,[
    				'ticket_fare' =>  'required'
    			],[
   					'ticket_fare.required'      =>'Vui lòng nhập giá vé!!',
    			]);
            $data['departPlace'] = Place::find($data['departPlace'])->name;
                
            $data['destination'] = Place::find($data['destination'])->name; 

            $data['slug'] = $data['departPlace'].'-'.$data[ 'destination' ];
    		$datas = Itinerary::where('id', $id)->first();
       		$datas->update($data);

    		 	Session::flash( 'success', 'Sửa Thành Công!!!' );

        		return redirect( route( 'admin.itinerary.index' ) );

    	} catch (Exception $e) {
    		\Log::info($e->getMessage());
                DB::rollback();
                            // something went wrong
                            // 
    	}
    }


    public function show( $id )
    { 
    	$data = Itinerary::find( $id );
    	return view ( 'admin.itinerary.show', [
    		'data' => $data
    		] );
    }


    public function destroy($id)
    {

        DB::beginTransaction();
        try {
            Itinerary::find( $id )->delete();
            DB::commit();
            return response()->json([
                    'error' => false,
                    'message' => 'Xóa thành công!'
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
    public function itinerary_ajax(Request $request)
    {
        $place = Place::with('stations')->find($request->id)->toArray();
         $html = "<option disabled selected value>  Xe không vào bến  </option>";
            foreach ($place['stations'] as $key => $value) {
                         # code...
                      $html .=  "<option value='".$value['id']."'>".$value['name']."</option>";
                     }
            return response()->json($html);

     }
         
    public function ajax(Request $request)
    {
         $pl = Place::with('stations')->find($request->id)->toArray();
         $html = "<option disabled selected value>  Xe không vào bến  </option>";
         foreach ($pl['stations'] as $key => $value) {
             # code...
            $html .=  "<option value='".$value['id']."'>".$value['name']."</option>";
         }
         return response()->json($html);

    }
}
