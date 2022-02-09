<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'name_photo',
    ];




    public function user()
    {
        return $this->belongsTo('App\user', 'photo_id', 'id');
    }


    public function item()
    {
        return $this->belongsTo('App\Item', 'photo_id', 'id');
    }



}
