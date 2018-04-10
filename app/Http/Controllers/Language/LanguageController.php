<?php

namespace App\Http\Controllers\Language;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App;
use Lang;
use Session;

class LanguageController extends Controller
{
    public function changeLanguage( Request $request)
    {
    	if($request->ajax()){
    		$request->session()->put('locale',$request->locale);
    	}
    }
}
