<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class CatProducts extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['code', 'name', 'status', 'created_at', 'updated_at'];

}
