<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $trade_id
 * @property string $description
 * @property string $avatar
 * @property string $weight
 * @property string $width
 * @property string $height
 * @property string $length
 * @property int $quantity
 * @property string $created_at
 * @property string $updated_at
 */
class BTradeProduct extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'b_trade_product';

    /**
     * @var array
     */
    protected $fillable = ['trade_id', 'description', 'avatar', 'weight', 'width', 'height', 'length', 'quantity', 'created_at', 'updated_at'];


    public function trade(){
        return $this->belongsTo('App\Models\BTrade','trade_id');
    }

}
