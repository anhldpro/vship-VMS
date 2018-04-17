<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $table = 'images';
    protected $fillable = [
        'type', 'content_id', 'url',
    ];

    public function station()
    {
        return $this->belongsTo('App\Models\Station');
    }

    public function getVehImgById($id)
    {
        return $this->where('content_id', $id)->where('type', 2)->get();

    }
}
