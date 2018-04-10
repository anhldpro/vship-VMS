<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Test extends Model
{
    use Translatable;
    protected $fillable = [
          'slug', 'status'
    ];
 
    public $translatedAttributes = ['name','content'];
}
