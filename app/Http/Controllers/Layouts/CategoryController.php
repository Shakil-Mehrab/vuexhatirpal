<?php

namespace App\Http\Controllers\Layouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;
use App\Model\Slide;


class CategoryController extends Controller
{
    public function index(){
        $categories=Category::whereNull('parent_id')->with('children','children.children')->get();
        return response()->json(['allCategories'=>$categories],200);
    }
    public function frontSlide(){
        $categories=Slide::where('slug','home')->get();
        return response()->json(['frontSlide'=>$categories],200);
    }
    public function featured(){
        $categories=Product::where('featured','1')->get();
        return response()->json(['featuredProduct'=>$categories],200);
    }
    public function fashionProduct(){
        $fashion=Category::where('slug','fashion')->first();
        $jewelry=Category::where('slug','jewelry')->first();
        $allProducts=collect([]);
        $allProducts=$fashion->allProducts();
        $jewelryies=$jewelry->allProducts();
        $allProducts = $allProducts->concat($jewelryies);
        return response()->json(['fashionProduct'=>$allProducts],200);
    }
    public function show($id)    {
        $category = Category::find($id);
        $products = $category->allProducts();
        return response()->json(['allCategoryProduct'=>$products],200);
    }
    public function searchByCat($id){
        $query = request('s');
        $category = Category::find($id);
        if($query==null){
            $products = $category->allProducts();
            return response()->json(['searchProductByCatId'=>$products],200);
        }
        $products = Product::orderBy('id','desc')->where('name','LIKE',"%$query%")->get();
        return response()->json(['searchProductByCatId'=>$products],200);
    }

    public function update(Request $request, $id)
    {
        //
    }
}
