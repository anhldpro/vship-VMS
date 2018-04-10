<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class News extends Model
{
    use softDeletes;

    protected $fillable = [
    		 'title', 'describe','content','images','category','user_id','slug','Vid','Lang',
    	];

   	public function user(){
    	 return $this->belongsTo('App\Models\User','user_id');
    }
}
