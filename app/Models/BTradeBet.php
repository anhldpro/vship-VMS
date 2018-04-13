<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $trade_id
 * @property int $acct_id
 * @property string $acct_name
 * @property int $bet_price
 * @property string $get_date
 * @property string $return_date
 * @property int $note
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class BTradeBet extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'b_trade_bet';

    /**
     * @var array
     */
    protected $fillable = ['trade_id', 'acct_id', 'acct_name', 'bet_price', 'get_date', 'return_date', 'note', 'status', 'created_at', 'updated_at'];

    public function trade(){
        return $this->belongsTo('App\Models\BTrade','trade_id');
    }

    public function betAccount(){
        return $this->belongsTo('App\Models\Account','acct_id');
    }


}
