<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\support\Str;

class Page extends Model
{
    //
    protected $fillable=[
    	'name','url', 'description','published'
    ];
    public function setUrlAttribute($value){
		$this->attributes['url']=Str::slug(mb_substr($this->name,0,40)/*."-".\Carbon\Carbon::now()->format('dmyHi')*/,'-');

    }
}
