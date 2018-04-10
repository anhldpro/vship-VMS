<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //

    protected $table = 'car_companies';

	/**
	 * @var array guarded column
	 */
	protected $fillable = array('id', 'name', 'phone','email','infomation','created_at','update_at');
}
