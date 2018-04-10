<?php

namespace App\Http\Controllers\TicketInformation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Log;
use Validator;
use View;
use App\Models\TicketInformation;
use App\Models\CarCompany;
use App\Models\Itinerary;
use App\Models\Place;
use Session;


class TicketInfomationController extends Controller
{
    public function admin_index()
    {
    	$data = TicketInformation::orderBy( 'created_at', 'DESC')->paginate(6);
    	$this->viewData = array(
    		'data' => $data
    		);
    	return view( 'admin.ticketInfo.index',$this->viewData );
    }


    public function create()
    {
    	$car_company = CarCompany::all();
    	$itinerary   = Itinerary::orderBy('id', 'DESC')->get();
      $place = Place::all();

    	$this->viewData =array(
    		'car_company' => $car_company,
    		'itinerary'   => $itinerary,
        'place'       => $place
    		);
    	return view ( 'admin.ticketInfo.create', $this->viewData );
    }

    public function store(Request $request)
    {
    	$data = $request->all();
    	try {
    		$rules = [
	   				'car_id'               =>'required',
	   				'itinerary_id'         =>'required',
	   				'time_start'           =>'required',
	                
   				];

   				$messages = [
   					'car_id.required'          =>'Vui lòng chọn nhà xe!!!',
   					'itinerary_id.required'    =>'Vui lòng chọn tuyến đường',
   					'time_start.required'      =>'Vui lòng chọn thời gian xuất phát',
	              	                
   				];

   				$validator = Validator::make( $request->all(), $rules, $messages);
   				if ( $validator->fails() ){
            	return redirect()->back()->withInput($data)->withErrors($validator);
           		}else{

           			TicketInformation::create( $data );

                Session::flash( 'success', 'Thêm mới thành công!!!' );

                return redirect( route( 'admin.ticketInfo.index' ) );
           		}
    	} catch (Exception $e) {
    			 \Log::info($e->getMessage());
    	}
    } 


    public function edit( $id )
    {
      $data = TicketInformation::find( $id );
      $place = Place::all();
      $car_company = CarCompany::all();
      $itinerary   = Itinerary::orderBy('id', 'DESC')->get();
        $this->viewData = array(
        'data' => $data,
        'car_company' => $car_company,
        'itinerary' => $itinerary,
        'place' => $place
        );
      return view ( 'admin.ticketInfo.edit', $this->viewData );
    }


    public function update( Request $request, $id )
    {
      $data = $request->all();
       unset( $data['_token']);
      try {
        $rules = [
            'car_id'               =>'required',
            'itinerary_id'         =>'required',
            'time_start'           =>'required',
                  
          ];

          $messages = [
            'car_id.required'          =>'Vui lòng chọn nhà xe!!!',
            'itinerary_id.required'    =>'Vui lòng chọn tuyến đường',
            'time_start.required'      =>'Vui lòng chọn thời gian xuất phát',
                                  
          ];

        $validator = Validator::make( $request->all(), $rules, $messages);
        if ( $validator->fails() ){
              return redirect()->back()->withInput($data)->withErrors($validator);
        }else{
        $datas = TicketInformation::where('id', $id)->first();
        $datas->update($data);

        Session::flash( 'success', 'Sửa thành công!!!' );

        return redirect( route( 'admin.ticketInfo.index' ) );
        }
      } catch (Exception $e) {
        Log::info( 'Không thể sửa' );
               DB::rollback();
                response()->json( [
                'error'     =>true,
                'message'   =>'Internal Server Error'
                ],500 );
      }
    }


    public function destroy($id)
    {

        DB::beginTransaction();
        try {
            TicketInformation::find( $id )->delete();
            DB::commit();
            return response()->json([
                    'error' => false,
                    'message' => 'Xóa thành công!!!'
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

    public function show( $id )
    {
      $data = TicketInformation::find( $id );
        $this->viewData = array(
        'data' => $data
        );
      return view ( 'admin.ticketInfo.show', $this->viewData );
    }   
}