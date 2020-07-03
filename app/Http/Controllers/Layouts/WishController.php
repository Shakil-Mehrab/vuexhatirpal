<?php

namespace App\Http\Controllers\Layouts;

use App\Http\Controllers\Controller;
use App\Model\Compare;
use Illuminate\Http\Request;
use App\Model\Wish;
use App\Model\Product;


use Auth;
class WishController extends Controller
{
    public function wishStore($id){
        $product=Product::find($id);
        $shop=new Wish();
        $shop->brand= $product->brand;
        $shop->sku =$product->sku;
        $shop->name =$product->name;
        $shop->slug =$product->slug;
        $shop->weight =$product->weight;
        $shop->description =$product->description;
        $shop->quantity =$product->quantity;
        $shop->price=$product->price;
        $shop->sale_price=$product->sale_price;
        $shop->cover_img=$product->cover_img;
        $shop->status=$product->status;
        $shop->featured=$product->featured;
        $shop->user_id=auth()->user()->id;
        $shop->product_id=$id;
        $shop->rating=$product->rating;
        $shop->save();
    }
    public function compareStore($id){
        $product=Product::find($id);
        $shop=new Compare();
        $shop->brand= $product->brand;
        $shop->sku =$product->sku;
        $shop->name =$product->name;
        $shop->slug =$product->slug;
        $shop->weight =$product->weight;
        $shop->description =$product->description;
        $shop->quantity =$product->quantity;
        $shop->price=$product->price;
        $shop->sale_price=$product->sale_price;
        $shop->cover_img=$product->cover_img;
        $shop->status=$product->status;
        $shop->featured=$product->featured;
        $shop->user_id=auth()->user()->id;
        $shop->product_id=$id;
        $shop->rating=$product->rating;
        $shop->save();
    }
    public function allCompareProduct(){
        $products = Compare::orderBy('id','desc')->where('user_id',auth()->user()->id)->paginate(20);
        return response()->json(['allCompareProduct'=>$products],200);
    }
    public function allWishProduct(){
        // dd('ok');
        $products = Wish::orderBy('id','desc')->where('user_id',auth()->user()->id)->paginate(20);
        return response()->json(['allWishProduct'=>$products],200);
    }
    public function removeWish($id){
        // dd('ok');
        $product= Wish::find($id);
        $product->delete();
    }
    public function removeCompare($id){
        // dd('ok');
        $product= Compare::find($id);
        $product->delete();
    }

}
