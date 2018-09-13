<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{

  protected $fillable = ['size_id', 'color_id', 'stock', 'product_id'];

  public function products(){
    return $this->belongsTo('App\Product');
  }

  public function size(){
    return $this->belongsTo('App\Size');
  }

  public function color(){
    return $this->belongsTo('App\Color');
  }

  public function pictures(){
    return $this->hasMany('App\Picture');
  }

}
