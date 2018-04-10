<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BookTicket extends Model
{
    use SoftDeletes;
	/**
	 * @var string table
	 */
	protected $table = 'book_tickets';

	/**
	 * @var array guarded column
	 */
	protected $fillable = array('id', 'car_id', 'itinerary_id','date_start','time_start', 'date_back', 'time_back', 'name','email','phone','code');

	public function car_company(){
         return $this->belongsTo('App\Models\CarCompany','car_id');  
    }

    public function itinerary(){
         return $this->belongsTo('App\Models\Itinerary','itinerary_id');  
    }
}
