<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageViewBlade extends Model
{
    use SoftDeletes;

	/**
	 * @var string table
	 */
	protected $table = 'image_view_blades';

	/**
	 * @var array guarded column
	 */
	protected $fillable = array('id', 'name', 'images');
}
