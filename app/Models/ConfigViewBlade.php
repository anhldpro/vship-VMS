<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfigViewBlade extends Model
{
    use SoftDeletes;

	/**
	 * @var string table
	 */
	protected $table = 'config_view_blades';

	/**
	 * @var array guarded column
	 */
	protected $fillable = array('id', 'name', 'value', 'value_en');
}
