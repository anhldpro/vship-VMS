<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Log;
use Illuminate\Support\Facades\Validator as Validator;
use App\Models\News;
use Response;
use Datatables;
use App\Models\CarCompany;
use App\Models\Station;
use App\Models\Itinerary;
use Session; 
use Auth;
use App;
use Config;
use Lang;
class NewsController extends Controller
{

  public function index(){
    $locale = App::getLocale(); 
    $station = Station::all();
    $car_company = CarCompany::all();
    $hanoi = Itinerary::where( 'departPlace', 'Hà Nội')->paginate(10);
    $danang = Itinerary::where( 'departPlace', 'Đà Nẵng')->paginate(10);
    $haiphong = Itinerary::where( 'departPlace', 'Hải Phòng')->paginate(10);
    $saigon = Itinerary::where( 'departPlace', 'Sài Gòn')->paginate(10);
    $nhatrang = Itinerary::where( 'departPlace' ,'Nha Trang')->paginate(10);
    $quangninh = Itinerary::where( 'departPlace', 'Quảng Ninh')->paginate(10);
    $data = News::where( 'Lang', $locale )->get();
    $this->viewData = array(
        'data' => $data,
        'car_company' => $car_company,
        'station' => $station,
        'hanoi' => $hanoi,
        'haiphong' => $haiphong,
        'saigon' => $saigon,
        'nhatrang' =>  $nhatrang,
        'quangninh' => $quangninh,
        'danang' => $danang,
      );
    return view('BookTicket.news', $this->viewData);
  }

  public function showDetail( $slug )
  {
    $locale = App::getLocale(); 
    $station = Station::all();
    $hanoi = Itinerary::where( 'departPlace', 'Hà Nội')->paginate(10);
    $danang = Itinerary::where( 'departPlace', 'Đà Nẵng')->paginate(10);
    $haiphong = Itinerary::where( 'departPlace', 'Hải Phòng')->paginate(10);
    $saigon = Itinerary::where( 'departPlace', 'Sài Gòn')->paginate(10);
    $nhatrang = Itinerary::where( 'departPlace' ,'Nha Trang')->paginate(10);
    $quangninh = Itinerary::where( 'departPlace', 'Quảng Ninh')->paginate(10);
    $car_company = CarCompany::all();

    $datas = News::orderBy( 'created_at','DESC' )->paginate(6);
    $news = News::where( 'slug', $slug )->first();
     if ($news->Lang != $locale) {
      // echo "no";
      $data = News::where( 'Lang', $locale )->where('Vid', $news['id'])->first();
      // if ($data){
      //   $slug = $data['slug'];
      // }
    }else{
      $data = News::where( 'slug', $slug )->first();
    }
    $this->viewData = array(
        'data' => $data,
        'car_company' => $car_company,
        'station' => $station,
        'datas' => $datas,
        'hanoi' => $hanoi,
        'haiphong' => $haiphong,
        'saigon' => $saigon,
        'nhatrang' =>  $nhatrang,
        'quangninh' => $quangninh,
        'danang' => $danang,
      );
      return view( 'BookTicket.newsDetail', $this->viewData);
  }


	public function admin_index()
    {
    	$data = News::orderBy( 'created_at','DESC' )->paginate(6);
        return view( 'admin.news.index',[
            'data' => $data
            ]);
    }
  public function index2(){

    return view('admin.news.index2');
  }

  public function index3(){
    return Datatables::of(News::query())->make(true);
  }

   	public function create()
   	{
    $data = News::all();
    $this->viewData = array(
      'data' => $data);
   	return view('admin.news.create', $this->viewData);
   	}


   	public function store(Request $request)
   	{
   	  try
   	  	{
   				$rules = [
	   				      'title'               =>'required',
	                'describe'            =>'required',
	                
   				];

   				$messages = [
   					      'title.required'      =>'Bạn vui lòng nhập tiêu đề',
	                'describe.required'   =>'Bạn vui lòng nhập tên rút gọn',
	                
   				];

   				$validator = Validator::make( $request->all(), $rules, $messages);

   				if ( $validator->fails() ){
            return redirect()->back()->withInput($data)->withErrors($validator);
          }
          else
          {

   					$data = $request->all();

            $name_img = time();
            
            $data['images'] = $request->file('images')->storeAs('images/news', $name_img.'.jpg' );
    
   					$data['category'] =1;

   					$data['user_id'] =Auth::user()->id;

   					$slug      = str_slug( $data['title'] );

   					$data['slug'] = $slug;



   					$news = News::create( $data );

            $id_news = $news['id'];

            $news_before = News::where('id', $data['Vid'])->first();
              $news_before['Vid'] = $id_news;
               $news_before->save();
   					Session::flash( 'success', 'Thêm mới thành công !!!!!');
              return redirect(route('admin.news.index')); 

   				}
   		}
   		catch (\Exception $e) {
                \Log::info($e->getMessage());
                            // something went wrong
                            // 
        }	

    }


    public function show ( $id )
    { 
      $data = News::find( $id );

      $news_id = $data['Vid'];
      // $news = News::where('id', $news_id)->get();
      // foreach ($news as $data_news) {
      //  $news_title = $data_news['title'];
      // }
      
      return view( 'admin.news.show',[
        'data' => $data,
        // 'news_title' => $news_title
        ] );
    }
    public function edit( $id )
    {
      $data = News::find( $id );
      $news = News::where('id', '<>', $id)->get();
      return view ( 'admin.news.edit',[
        'data' => $data,
        'news' => $news
        ] );
    }

    public function update( Request $request, $id)
    {
      $data = $request->all();
        if($data['Vid']==null){
                $data['Vid'] = 0;
              }
          unset($data['_token']);
          unset($data['_method']);
    
        $name_img = time();

        DB::beginTransaction();

        try{
            if(!$request->hasFile('images')){
            
              $news = News::where('id', $id)->first();
              $news->update($data);
              DB::commit();
              Session::flash( 'success', 'Sửa thành công !!!!!');
              return redirect(route('admin.news.index'));
            }else{
               $news =  $data['images'] = $request->file('images')->storeAs('images/news', $name_img.'.jpg' );
               $news = News::where('id', $id)->first();

               $news->update($data);
               DB::commit();
              Session::flash( 'success', 'Sửa thành công !!!!!');
              return redirect(route('admin.news.index'));
            }
        }catch (\Exception $e) {
                \Log::info($e->getMessage());
                DB::rollback();
                    // something went wrong
                    // 
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
            News::find( $id )->delete();
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


    public function search(Request $request)
    {
      $keyword = $request->input('keyword');
      $datas = News::where('title', 'LIKE', '%'.$keyword.'%')
              ->orWhere('describe', 'LIKE', '%'.$keyword.'%')
              ->paginate(6);
      $view  = view('admin.news.data',[
        'datas' => $datas,
      ])->render();
      return response($view);
    }       

}
