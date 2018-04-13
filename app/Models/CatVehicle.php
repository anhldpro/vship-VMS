<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $p_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property string $status
 */
class CatVehicle extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cat_vehicle';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    protected $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['p_id', 'name', 'created_at', 'updated_at', 'status'];

}
