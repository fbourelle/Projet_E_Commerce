<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = ['designation', 'description', 'weight', 'price', 'material'];

  public function tags(){
    return $this->belongsToMany('App\Tag');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function variants(){
    return $this->hasMany('App\Variant');
  }

  public function category(){
    return $this->belongsTo('App\Category');
  }

}
