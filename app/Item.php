<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'countryMade', 'status', 'regStatus', 'photo_id', 'user_id', 'categorie_id',
    ];



    public function photo()
    {
        return $this->hasOne('App\Photo', 'id', 'photo_id');
    }


    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'item_id', 'id');
    }

}
