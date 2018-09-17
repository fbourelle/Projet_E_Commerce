<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = ['designation', 'category_id', 'description', 'weight', 'price', 'material', 'etiquettes_list', 'reduction', 'real_price', 'online'];

  public function etiquettes(){
    return $this->belongsToMany('App\Etiquette');
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

  public function getMaterialAttribute($value)
  {
    return ucfirst($value);
  }

  public function getRealPriceAttribute(){
    return ($this->price * $this->reduction)/100;
  }

  public function getEtiquettesListAttribute(){
    if($this->id){
      return $this->etiquettes->pluck('id');
    }
  }

  public function setEtiquettesListAttribute($value){
    // dd($value);
    // if($this->id){
      return $this->etiquettes()->sync($value);
    // }
  }

}
