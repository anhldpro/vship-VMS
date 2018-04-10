<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarCompany extends Model
{
    use SoftDeletes;

	/**
	 * @var string table
	 */
	protected $table = 'car_companies';

	/**
	 * @var array guarded column
	 */
	protected $fillable = array('id', 'name', 'phone', 'email', 'infomation', 'address','avatar');

	public function bookTicket(){
    	 return $this->hasMany('App\Models\BookTicket', 'car_id');
    }

    public function itinerary(){
    	 return $this->hasMany('App\Models\Itinerary', 'car_id');
    }

    public function images(){
    	return $this->hasMany('App\Models\ImagesFiles', 'content_id')->where('type', '=', 'App\\Models\\CarCompany');
    }
}
