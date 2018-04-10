<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Itinerary extends Model
{
   use SoftDeletes;

	/**
	 * @var string table
	 */
	protected $table = 'itineraries';

	/**
	 * @var array guarded column
	 */
	protected $fillable = array('id', 'departPlace', 'destination','slug', 'ticket_fare','station_id_dp','station_id_des','ticket_fare');

	public function bookTicket(){
    	 return $this->hasMany('App\Models\BookTicket', 'itinerary_id');
    }

    public function ticketInfo()
    {
    	return $this->hasMany( 'App\Models\TicketInfomation', 'itinerary_id');
    }

    public function station(){
    	return $this->belongsTo('App\Models\Station','station_id_dp');
    }
}
