<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    public function product(){
       return $this->belongsTo('App\Model\Product');
    }
}
