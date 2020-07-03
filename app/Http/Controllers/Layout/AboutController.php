<?php

namespace App\Http\Controllers\Layout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Slide;
class AboutController extends Controller
{

    public function faq()
    {
        $products=Product::orderBy('created_at','desc')->paginate(8);
        return view("layout.pages.about.faq",compact('products'));
    }
    public function sitemap()
    {
        $products=Product::orderBy('created_at','desc')->paginate(8);
        return view("layout.pages.about.sitemap",compact('products'));
    }
    public function contact()
    {
        $products=Product::orderBy('created_at','desc')->paginate(8);
        return view("layout.pages.about.contact",compact('products'));
    }
    public function banner()
    {
        $products=Product::orderBy('created_at','desc')->paginate(8);
        return view("layout.pages.about.banner",compact('products'));
    }

    public function about()
    {
        // $members=Membership::orderBy('created_at','desc')->get();
        $slides=Slide::orderBy('created_at','desc')->where('name','about')->get();
        return view("public.pages.aboutUs",compact('slides'));
    }
    public function helpline(){
        $slides=Slide::orderBy('created_at','desc')->get();
        return view("public.pages.helpline",compact('slides'));
    }
    public function condition(){
        return view('public.pages.termsCondition');
    }
    public function moneyback(){
        return view('public.pages.moneyback');
    }
    public function howToOrder(){
        return view('public.pages.howtoorder');
    }
}
