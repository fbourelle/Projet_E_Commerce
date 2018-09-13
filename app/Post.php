<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Category;
use App\Tag;

class Post extends Model
{
  protected $fillable = ['title', 'slug', 'content', 'online', 'category_id', 'tags_list'];

// Plus nécessaire, utiliser les objets "Requests"
  // public static $rules =
  //               [
  //                 'title' => 'required|min:5',
  //                 'content' => 'required|min:10'
  //               ];

  // scope qui va chercher que les posts qui sont 'online'
  public function scopePublished($query) {
    return $query->where('online', true)->whereRaw('created_at < Now()');
  }

  public function category(){
    return $this->belongsTo('App\Category');
  }

  public function tags(){
    return $this->belongsToMany('App\Tag');
  }

  // Scope qui va chercher quand dans le titre on a $q
  public function scopeSearchByTitle($query, $q)
  {
    return $query->where('title', 'LIKE', '%' . $q . '%');
  }

  // Le getter, modifie le titre lors du get
  public function getTitleAttribute($value)
  {
    return ucfirst($value);
  }
  // Le setter (mutateur), modifie le slug lors du set
  public function setSlugAttribute($value)
  {
    if(empty($value)) {
      $this->attributes['slug'] = Str::slug($this->title);
    }
  }

  public function getDates()
   {
    return ['created_at', 'updated_at', 'published_at'];
  }

  public function getTagsListAttribute(){
    if($this->id){
      return $this->tags->pluck('id');
    }
  }

  public function setTagsListAttribute($value){
    return $this->tags()->sync($value);
  }

  // public function setPublishedAtAttribute($value)
  // {
  //     $this->attributes['published_at'] =  Carbon::parse($value);
  // }

// ->> Pour que le routing se fasse à partir du slug et non de l'id
  // public function getRouteKey()
  // {
  //   return $this->slug;
  // }
}
