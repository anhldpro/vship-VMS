<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $road_id
 * @property string $mon
 * @property string $tue
 * @property string $wed
 * @property string $thur
 * @property string $fri
 * @property string $sat
 * @property string $sun
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class AVehicleRoadSched extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'a_vehicle_road_sched';

    /**
     * @var array
     */
    protected $fillable = ['road_id', 'mon', 'tue', 'wed', 'thur', 'fri', 'sat', 'sun', 'status', 'created_at', 'updated_at'];

    public function vehicleRoad(){
        return $this->belongsTo('App\Models\AVehicleRoad','road_id');
    }


}
