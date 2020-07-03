<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;
class Discount extends Model
{
    public function products(){
        return $this->belongsToMany(Product::class,'product_discounts');
    }
    public function allProducts(){

        return $mainCategoryProducts = $this->products;
    }
}
