<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function product(){
		return $this->belongsTo('App\Model\Product');
	}
	public function user(){
		return $this->belongsTo('App\User');
	}
	public function replies(){
        return $this->hasMany('App\Model\Reply');
    }
}
