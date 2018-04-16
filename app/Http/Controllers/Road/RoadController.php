<?php

namespace App\Http\Controllers\Road;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoadController extends Controller
{
    //

    public function index(){
        $this->viewData = array(
        );
        return view('vms.road.index', $this->viewData);
    }

    public function create(){
        $this->viewData = array(

        );
        return view('vms.road.create', $this->viewData);
    }


}
