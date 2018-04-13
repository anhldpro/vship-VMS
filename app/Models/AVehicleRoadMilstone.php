<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $road_id
 * @property int $tx_id
 * @property string $pos_map
 * @property string $pos_name
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class AVehicleRoadMilstone extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'a_vehicle_road_milstone';

    /**
     * @var array
     */
    protected $fillable = ['road_id', 'tx_id', 'pos_map', 'pos_name', 'status', 'created_at', 'updated_at'];

    public function vehicleRoad(){
        return $this->belongsTo('App\Models\AVehicleRoad','road_id');
    }

}
