<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_id
 * @property int $pack_id
 * @property string $note
 * @property string $sender_name
 * @property string $sender_mobile
 * @property string $receiver_name
 * @property string $receiver_mobile
 * @property string $from_pos
 * @property string $from_name
 * @property string $from_province
 * @property string $from_prov_name
 * @property string $from_district
 * @property string $from_dist_name
 * @property string $from_village
 * @property string $from_vig_name
 * @property string $from_note
 * @property string $from_date_exp
 * @property string $to_pos
 * @property string $to_name
 * @property string $to_province
 * @property string $to_prov_name
 * @property string $to_district
 * @property string $to_dist_name
 * @property string $to_village
 * @property string $to_vig_name
 * @property string $to_note
 * @property string $to_date_exp
 * @property int $trade_type
 * @property int $price
 * @property int $pay_type
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class BTrade extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'b_trade';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'pack_id', 'note', 'sender_name', 'sender_mobile', 'receiver_name', 'receiver_mobile', 'from_pos', 'from_name', 'from_province', 'from_prov_name', 'from_district', 'from_dist_name', 'from_village', 'from_vig_name', 'from_note', 'from_date_exp', 'to_pos', 'to_name', 'to_province', 'to_prov_name', 'to_district', 'to_dist_name', 'to_village', 'to_vig_name', 'to_note', 'to_date_exp', 'trade_type', 'price', 'pay_type', 'status', 'created_at', 'updated_at'];


    public function productType(){
        return $this->belongsTo('App\Models\CatProducts','product_id');
    }

    public function packageType(){
        return $this->belongsTo('App\Models\CatPackages','pack_id');
    }



}
