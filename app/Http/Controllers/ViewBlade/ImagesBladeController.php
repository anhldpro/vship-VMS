<?php

namespace App\Http\Controllers\ViewBlade;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ImageViewBlade;
use DB;
use Log;
use Illuminate\Support\Facades\Validator as Validator;
use Session;
use View;

class ImagesBladeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_index()
    {
        $data = ImageViewBlade::orderBy( 'created_at', 'DESC')->paginate(6);
        $this->viewData = array(
            'data' => $data
        );
        return view( 'admin.imageViewBlade.index', $this->viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.imageViewBlade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $request->all();
        try
        {
            $rules = [
            'name'                 =>'required',
            'images'                =>'required',
            ];
            $messages = [
             'name.required'        =>'Vui lòng nhập tên!!!',
             'images.required'       =>'Vui lòng chọn ảnh!!!',
            ];

            $validator = Validator::make( $request->all(), $rules, $messages);

            if ( $validator->fails() ){
               return redirect()->back()->withInput($data)->withErrors($validator);
            }else{
                $extension =  $data['images']->getClientOriginalName();
                $data['images'] = $request->file('images')->storeAs('images/vexe',$extension);
                ImageViewBlade::create( $data );

                Session::flash( 'success', 'Thêm mới thành công !!!!!');

                  return redirect( route( 'admin.imgBlade.index' ) );   
            }
        }catch (Exception $e) {
            \Log::info($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ImageViewBlade::find( $id );
        $this->viewData = array(
            'data' => $data
            );
        return view ( 'admin.imageViewBlade.show', $this->viewData );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ImageViewBlade::find( $id );
        $this->viewData = array(
            'data' => $data
            );
        return view ( 'admin.imageViewBlade.edit', $this->viewData );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request -> all();
        try
        {
            $rules = [
            'name'                 =>'required',
            ];
            $messages = [
             'name.required'        =>'Vui lòng nhập tên!!!',
            ];

            $validator = Validator::make( $request->all(), $rules, $messages);

            if ( $validator->fails() ){
               return redirect()->back()->withInput($data)->withErrors($validator);
            }else{
                if(!$request->hasFile('images')){
                   $datas = ImageViewBlade::where('id', $id)->first();
                   $datas->update($data);
                   DB::commit();
                   Session::flash( 'success', 'Sửa thành công !!!!!');
                   return redirect(route('admin.imgBlade.index'));
                }else{
                    $images = $data['images'];
                    $name_img = $images->getClientOriginalName();
                    $data['images'] = $request->file('images')->storeAs('images/vexe', $name_img );
                    $datas = ImageViewBlade::where('id', $id)->first();
                    $datas->update($data);
                    DB::commit();
                    Session::flash( 'success', 'Sửa thành công !!!!!');
                    return redirect(route('admin.imgBlade.index')); 
                }
            }    
        }catch (Exception $e) {
            \Log::info($e->getMessage());
        }
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            ImageViewBlade::find( $id )->delete();
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
