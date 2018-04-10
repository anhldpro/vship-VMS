<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\TestTranslation;
use App\Models\Itinerary;
use App\Models\Station;
use App\Models\CarCompany;
use App;
use Session;
use Config;
use Lang;
class TestController extends Controller
{
    function all(Request $request)
    {		
    $locale = App::getLocale();
    dd($locale);    
    $data = Test::all()->toArray();
    $station = Station::all();
    $car_company = CarCompany::all();
    $hanoi = Itinerary::where( 'departPlace', 'Hà Nội')->paginate(10);
    $danang = Itinerary::where( 'departPlace', 'Đà Nẵng')->paginate(10);
    $haiphong = Itinerary::where( 'departPlace', 'Hải Phòng')->paginate(10);
    $saigon = Itinerary::where( 'departPlace', 'Sài Gòn')->paginate(10);
    $nhatrang = Itinerary::where( 'departPlace' ,'Nha Trang')->paginate(10);
    $quangninh = Itinerary::where( 'departPlace', 'Quảng Ninh')->paginate(10);
   
   	$this->viewData = array(
   		'data' => $data,
   		'hanoi' => $hanoi,
        'haiphong' => $haiphong,
        'saigon' => $saigon,
        'nhatrang' =>  $nhatrang,
        'quangninh' => $quangninh,
        'danang' => $danang,
        'car_company' => $car_company,
        'station' => $station,
   	);
   	return view('BookTicket.test', $this->viewData);
    }

    public function create()
   	{
   	return view('admin.test.create');
   	}

   	public function store(Request $request)
   	{
   		$data = $request->all();
   		$test = Test::create();
   		$test_id = $test->id;
      $data['test_id'] = $test_id;
      $data = TestTranslation::create($data);
      echo("Ok");
   	}
}
