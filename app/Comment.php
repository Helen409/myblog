<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\support\Str;

class Comment extends Model
{
    //
     // //mass asigned
    protected $fillable=[
    	'text','published','created_by','article_id'
    ];

    	public function setPublishedAttribute($value){
		$this->attributes['published']='1';
	}	

	public function articles() {
      return $this->belongsTo('App\Article');
    }
}
