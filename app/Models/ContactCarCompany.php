<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactCarCompany extends Model
{
    protected $table = 'contact_car_companies';

	/**
	 * @var array guarded column
	 */
	protected $fillable = array('id', 'fullname', 'phonenumber','email','car_id','itinerary_id');
}
