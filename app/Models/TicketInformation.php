<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketInformation extends Model
{
    
   use SoftDeletes;

	/**
	 * @var string table
	 */
	protected $table = 'ticket_informations';

	/**
	 * @var array guarded column
	 */
	protected $fillable = array('id', 'car_id', 'itinerary_id','time_start', 'time_back');
	
	public function car_company(){
         return $this->belongsTo('App\Models\CarCompany','car_id');  
    }

    public function itinerary()
    {
    	return $this->belongsTo( 'App\Models\Itinerary', 'itinerary_id');
    }
}
