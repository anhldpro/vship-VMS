<?php

namespace App\Http\Controllers\Place;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Place;
use Response;
use DB;
use Log;
use Illuminate\Support\Facades\Validator as Validator;
use Session; 

class PlaceController extends Controller
{	

	public function admin_index()
    {
    	$data = Place::orderBy( 'created_at','DESC' )->paginate(6);
        return view( 'admin.places.index',[
            'data' => $data
            ]);
    }


   	public function create()
   	{
   	return view('admin.places.create');
   	}


   	public function store(Request $request)
   	{
	   DB::beginTransaction();
      if($request->ajax()){
   	  try
   	  	{
   				$rules = [
	   				'name'               =>'required',
	                
   				];

   				$messages = [
   					'name.required'      =>'Vui lòng nhập tên!!',
	              	                
   				];

   				$validator = Validator::make( $request->all(), $rules, $messages);

   				if ( $validator->fails() ){
           DB::commit();
                return response()->json([
                    'error'      => true,
                    'message'   =>$validator->errors(),
                    'data'    => $request -> all()
                ],200);
            }
            else{

   					$data = $request->all();
            // unset( $data['_token']);
   					Place::create( $data );

   					 DB::commit();
                    return response()->json([
                            'error' => false,
                            'data' => $data,
                        ], 200);
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

    public function edit( $id )
    {
      $data = Place::find( $id );
      return view( 'admin.places.edit',[
        'data' => $data
        ] );
    }

    public function update( Request $request, $id )
    {
      $data = $request->all();
      unset( $data['_token']);

      try {
        $this->validate( $request, [
            'name' => 'required',
          ],[
            'name.required' => 'Vui lòng nhập tên'
          ]);

        $datas = Place::where('id', $id)->first();
        $datas->update($data);

        Session::flash( 'success', 'Sửa thành công!!!' );

        return redirect( route( 'admin.place.index' ) );

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
            Place::find( $id )->delete();
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
}
