<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    public function products(){
		return $this->belongsTo('App\Model\Product');
	}
}
