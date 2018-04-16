<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $level
 * @property int $p_id
 * @property string $code
 * @property string $name
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class CatPlace extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['level', 'p_id', 'code', 'name', 'status', 'created_at', 'updated_at'];

    public function getVnProvince(){
        return $this->where('level', '1')->get();
    }

}
