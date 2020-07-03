<?php

namespace App\Model;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products(){
        return $this->hasMany(Product::class, 'shop_id');
    }
}
