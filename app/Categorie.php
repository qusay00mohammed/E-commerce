<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
  protected $fillable = [
    'name', 'description', 'ordering', 'parent', 'visibility', 'allowComment', 'allowAds'
  ];

  public function items()
  {
    return $this->hasMany('App\Item', 'categorie_id', 'id');
  }
}
