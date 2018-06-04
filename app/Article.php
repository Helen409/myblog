<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\support\Str;

class Article extends Model
{	//
	protected $fillable=['name','url', 'description','description_short','image','published','category_id','created_by','updated_by'];
	
    public function setUrlAttribute($value){
			$this->attributes['url']=Str::slug(mb_substr($this->name,0,40)/*."-".\Carbon\Carbon::now()->format('dmyHi')*/,'-');


    }

    //связь с категориями
    public function categories(){
    	/*return $this->morphtoMany('App\Category','categoryable');*/
    	return $this->belongsTo('App\Category','category_id');
    }
    //связь с тегами
	public function tags()
	    {
	      return $this->belongsToMany('App\Tag','article_tag');
	    }
     public function users()
        {
          return $this->belongsTo('App\User','created_by');
        }   
    public function comments()
        {
          return $this->hasMany('App\Comment');
        }        

	// Scope
    public function scopeLastArticles($query, $count){
      return $query->orderBy('created_at','desc')->take($count)->get();
    }
    public function scopePublished($query){
        return $query->where('published',1);
    }
    public function scopePublishedNot($query){
        return $query->where('published',0);
    }
}
