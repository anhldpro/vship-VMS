<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    //
    use SoftDeletes;
    protected $table = 'rating';
    protected $fillable = array('id', 'car_id', 'itinerary_id','departDate', 'name','email','comment','overall_rating','quality_rating','intime_rating','service_rating');
}
