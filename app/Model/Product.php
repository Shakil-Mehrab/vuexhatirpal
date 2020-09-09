<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Shop;
use App\Model\User_product_view;
use App\Model\Category;
use App\Model\Attribute;
use App\Model\Product_discount;
use App\Model\Reviewf;


use App\User;




class Product extends Model
{
    public function shop(){
    return $this->belongsTo(Shop::class, 'shop_id');
    }
    public function productCategories(){
	return $this->belongsToMany(Category::class,'product_categories');
    }
    public function product_attributes(){
    return $this->belongsToMany(Attribute::class,'product_attributes');
    }
    public function productViews(){
    return $this->hasMany(User_product_view::class);
    }
    public function viewedUsers(){
        return $this->belongsToMany(User::class ,'user_product_views')->withTimestamps()->withPivot(['count']);
     }
     public function views(){
        return $this->viewedUsers()->sum('count');

     }
     public function reviews(){
        return $this->hasMany(Review::class);

     }
     public function discount(){
        return $this->hasMany(Product_discount::class);

     }
}
