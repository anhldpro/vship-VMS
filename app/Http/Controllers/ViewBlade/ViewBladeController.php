<?php

namespace App\Http\Controllers\ViewBlade;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConfigViewBlade;
use Response;
use DB;
use Log;
use Illuminate\Support\Facades\Validator as Validator;
use Cookie;
use Session;

class ViewBladeController extends Controller
{
   public function index()
   {
   	 $footer = ConfigViewBlade::orderBy( 'created_at', 'DESC')->paginate(6);
   	 // dd($footer);
   	 return view( 'layouts.masterTicket', [
   	 	'footer' => $footer
   	 	]);
   }


    public function admin_index( Request $request)
    {	
    	$cookie = $request->cookie('success');
    	$data = ConfigViewBlade::orderBy( 'created_at','DESC' )->paginate(6);
        return view( 'admin.configViewBlade.index',[
            'data' => $data,
            'cookie' => $cookie
            ]);
    }
    public function create()
    {
    	return view( 'admin.configViewBlade.create' );
    }


    public function store( Request $request)
    {
    	DB::beginTransaction();
      if($request->ajax()){
   	  try
   	  	{
   				$rules = [
	   				'name'               =>'required',
	                
   				];

   				$messages = [
   					'name.required'      =>'Bạn vui lòng nhập tên',
	              	                
   				];
   				$validator = Validator::make( $request->all(), $rules, $messages);

   				if ( $validator->fails() ){
           // DB::commit();
                return response()->json([
                    'error'      => true,
                    'message'   =>$validator->errors(),
                    'data'    => $request -> all()
                ],200);
            }
            else{

   					$data = $request->all();
            // dd($data);die;
   					ConfigViewBlade::create( $data );

   					 DB::commit();

                    return response()->json([
                            'error' => false,
                            'data' => $data,
                            'images' => $data['images']
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



   	public function show( $id )
    {
      $data = ConfigViewBlade::find( $id );
      return view ( 'admin.configViewBlade.show',[
        'data' => $data,
        ] );
    }



   	public function edit( $id )
    {
      $data = ConfigViewBlade::find( $id );
      // $data['id'];
      return view ( 'admin.configViewBlade.edit',[
        'data' => $data
        ] );
    }


    public function update( Request $request, $id)
    {
      $data = $request->all();

      unset($data['_token']);
      unset($data['_method']);


      DB::beginTransaction();

      try{
        
          $news = ConfigViewBlade::where('id', $id)->first();
          $news->update($data);
          DB::commit();

          Session::flash( 'success', 'Sửa thành công !!!!!');

          return redirect(route('admin.viewBlade.index'));

      }catch (\Exception $e) {

            \Log::info($e->getMessage());

            DB::rollback();
                // something went wrong
                // 
      }
    }


    public function destroy($id)
    {

        DB::beginTransaction();
        try {
            ConfigViewBlade::find( $id )->delete();

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
