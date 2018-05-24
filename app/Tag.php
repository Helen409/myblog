<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\support\Str;

class Tag extends Model
{
    // //mass asigned
    protected $fillable=['name','url', 'published','created_by','updated_by'];
    //mutators

    public function setUrlAttribute($value){
		$this->attributes['url']=Str::slug(mb_substr($this->name,0,40)/*."-".\Carbon\Carbon::now()->format('dmyHi')*/,'-');
	}	
	//связь с Article
	public function articles() {
      return $this->belongsToMany('App\Article','article_tag');
    }
	//Scope
	public function scopeLastTags($query, $count){
    	return $query->orderBy('name','asc')->take($count)->get();
    }

}
