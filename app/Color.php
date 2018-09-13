<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
  // protected $fillable = ['name'];

  public function variants(){
    return $this->hasMany('App\Variant');
  }

}
