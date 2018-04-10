<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model
{
     use softDeletes;

    protected $fillable = [
    		 'name',
    	];

    public function stations()
    {
    	return $this->hasMany('App\Models\Station','place_id');
    }

}
