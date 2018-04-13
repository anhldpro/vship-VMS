<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $veh_type
 * @property string $veh_capacity
 * @property string $avatar
 * @property string $desc
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class AVehicle extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'a_vehicle';

    /**
     * @var array
     */
    protected $fillable = ['veh_type', 'veh_capacity', 'avatar', 'desc', 'status', 'created_at', 'updated_at'];

    public function vehType(){
        return $this->belongsTo('App\Models\CatVehicle','veh_type');
    }

    public function vehCapacity(){
        return $this->belongsTo('App\Models\VehCapacity','veh_capacity');
    }

}
