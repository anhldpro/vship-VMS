<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $acct_type
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $email
 * @property string $mobile
 * @property string $telephone
 * @property string $address
 * @property string $contact_name
 * @property string $avatar
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property CorpInfo[] $corpInfos
 */
class Account extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'account';

    /**
     * @var array
     */
    protected $fillable = ['acct_type', 'username', 'password', 'name', 'email', 'mobile', 'telephone', 'address', 'contact_name', 'avatar', 'remember_token', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function corpInfos()
    {
        return $this->hasMany('App\Models\CorpInfo');
    }
}
