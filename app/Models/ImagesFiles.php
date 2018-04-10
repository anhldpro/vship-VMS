<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImagesFiles extends Model
{
    use SoftDeletes;

	/**
	 * @var string table
	 */
	protected $table = 'images';

	/**
	 * @var array guarded column
	 */
	protected $fillable = array('id', 'type', 'content_id','url');

	 public function itinerary()
    {
    	return $this->belongsTo( 'App\Models\CarCompany', 'content_id');
    }
}
