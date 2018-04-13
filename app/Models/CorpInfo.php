<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $account_id
 * @property string $corp_name
 * @property string $telephone
 * @property string $website
 * @property string $address
 * @property string $tax_code
 * @property string $buss_code
 * @property string $info
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property Account $account
 */
class CorpInfo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'corp_info';

    /**
     * @var array
     */
    protected $fillable = ['account_id', 'corp_name', 'telephone', 'website', 'address', 'tax_code', 'buss_code', 'info', 'remember_token', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo('App\Models\Account');
    }
}
