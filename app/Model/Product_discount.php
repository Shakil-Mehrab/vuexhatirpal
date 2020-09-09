<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product_discount extends Model
{
    public function product(){
    return $this->belongsTo('App\Model\Product');
    }
    public function discount(){
    return $this->belongsTo('App\Model\Discount');
    }
}
