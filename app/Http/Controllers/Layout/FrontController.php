<?php

namespace App\Http\Controllers\Layout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User_product_rating;
use App\Model\User_product_view;
use App\Model\Product_video;
use App\Model\Order_product;
use App\Model\Category;
use App\Model\Product;
use App\Model\Country;
use App\Model\Review;
use App\Model\Slide;
use App\Model\Video;


class FrontController extends Controller
{
    public function index(){
        if (auth()->check()){
            return redirect()->route('home');
        }
        // $videos=Video::orderBy('id','desc')->limit(4)->get();
        // $product_videos=Product_video::orderBy('id','desc')->paginate(8);
        // $countries=Country::orderBy('id','desc')->where('pavilion','1')->limit('7')->get();
        $products=Product::orderBy('id','desc')->limit('10')->get();

		return view("welcome",compact('products'));
	}
    public function blog()
    {
        $categories=Product::with('user','category')->orderBy('id','asc')->paginate('2');
        return response()->json(['blogs'=>$categories],200);
    }
    public function pagin()
    {
        $categories=Product::with('user','category')->orderBy('id','asc')->paginate(2);
        return response()->json(['paginBlogs'=>$categories],200);
    }
     public function blogbyid($id)
    {
        $categories=Product::with('user','category')->where('category_id',$id)->paginate(1);
        return response()->json(['blogsbycats'=>$categories],200);
    }
     public function latestPost()
    {
        $categories=Product::with('user','category')->get();
        return response()->json(['latestPosts'=>$categories],200);
    }
     public function category()
    {
         $categories=Category::all();
        return response()->json(['categories'=>$categories],200);
    }
     public function searchPost()
    {
        // dd($keyword);
        $search = \Request::get('s');
       $categories=Product::with('user','category')->where('name','LIKE','%'.$search.'%')->get();
        return response()->json(['searchPosts'=>$categories],200);
    }
    public function popular()
    {
        $pop_products=User_product_view::orderBY('count','desc')->get();
        $latest_products=Product::orderBY('id','desc')->where('status','approved')->limit(5)->get();
        $popular_products=User_product_view::orderBY('count','desc')->limit(5)->get();
        return view("layout.pages.products.popular",compact('pop_products','latest_products','popular_products'));
    }
    public function recent()
    {
        $products=Product::orderBY('id','desc')->where('status','approved')->get();
        $latest_products=Product::orderBY('id','desc')->where('status','approved')->limit(5)->get();
        $popular_products=User_product_view::orderBY('count','desc')->limit(5)->get();
        return view("layout.pages.products.recent",compact('products','latest_products','popular_products'));
    }
    public function special()
    {
        $products=Product::orderBy('created_at','desc')->where('discount','>','0')->where('status','approved')->get();
        $latest_products=Product::orderBY('id','desc')->where('status','approved')->limit(5)->get();
        $popular_products=User_product_view::orderBY('count','desc')->limit(5)->get();
        return view("layout.pages.products.specialOffer",compact('products','latest_products','popular_products'));
    }
    public function temporary()
    {
        return view("temporary");

    }
    public function commingsoon()
    {
        return view("comming-soon");
    }
}


