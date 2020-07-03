<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Slide;

use TCG\Voyager\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allProducts=Product::all();
        $products=Product::orderBy('id','desc')->limit(8)->get();

        $categories = Category::whereNull('parent_id')->get();
        $slides = Slide::orderBy('id','desc')->where('name','home')->get();

        return view('home',compact('allProducts','categories','slides','products'));
    }
}
