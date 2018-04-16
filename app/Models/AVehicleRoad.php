<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $veh_id
 * @property string $from_pos
 * @property string $from_name
 * @property string $to_pos
 * @property string $to_name
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class AVehicleRoad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'a_vehicle_road';

    /**
     * @var array
     */
    protected $fillable = ['veh_id', 'fix_road', 'from_pos', 'from_place_id', 'from_name', 'to_pos', 'to_place_id', 'to_name', 'status', 'created_at', 'updated_at'];

    public function vehicle(){
        return $this->belongsTo('App\Models\AVehicle','veh_id');
    }

    public function vehSched(){
        return $this->hasOne('App\Models\AVehicleRoadSched', 'road_id');
    }

    public function getRoadByVehId($id){
        return $this->where('veh_id', $id)->get();
    }

}
