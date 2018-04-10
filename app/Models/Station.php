<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Station extends Model
{
    //
     use softDeletes;
    protected $table = 'stations';

    protected $fillable = [
    		 'name', 'phone','email','infomation','place_id', 'avatar'
    	];
     public function images(){
    	return $this->hasMany('App\Models\Image','content_id');
    }
    public function places(){
    	return $this->belongsTo('App\Models\Place','station_id');
    }
    public function car_company(){
    	return $this->hasMany('App\Models\CarCompany','station_id');
    }
    public function itinerary(){
        return $this->hasMany('App\Models\Itinerary','station_id_dp');
    }
}
