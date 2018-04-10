<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Contact extends Model
{
     use SoftDeletes;

	/**
	 * @var string table
	 */
	protected $table = 'contacts';

	/**
	 * @var array guarded column
	 */
	protected $fillable = array('id', 'name', 'phone', 'email', 'content');
}
