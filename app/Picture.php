<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
  public function variant(){
    return $this->belongsTo('App\Variant');
  }
}
