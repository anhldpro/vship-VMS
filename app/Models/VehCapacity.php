<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 */
class VehCapacity extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'vehicle_capacities';

    /**
     * @var array
     */
    protected $fillable = ['name', 'value', 'created_at', 'updated_at'];

}
