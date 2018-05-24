<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\support\Str;

class Category extends Model
{
   
   //mass asigned
    protected $fillable=['name','url', 'description','published','created_by','updated_by'];
    //mutators
    public function setUrlAttribute($value){
$this->attributes['url']=Str::slug(mb_substr($this->name,0,40)/*."-".\Carbon\Carbon::now()->format('dmyHi')*/,'-');

    }
    // Get children category
   /* public function children() {
      return $this->hasMany(self::class, 'parent_id');
    }*/
    /*public function articles() {
      return $this->morphedByMany('App\Article', 'categoryable');
    }*/
    //связь с Article
    public function articles() {
      return $this->hasMany('App\Article');
    }
    //Scope
    public function scopeLastCategories($query, $count){
      return $query->orderBy('name','asc')->take($count)->get();
    }
}

