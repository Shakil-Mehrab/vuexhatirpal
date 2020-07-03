<?php

namespace App\Http\Controllers\Layouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ShopActivationRequest;
use Illuminate\Support\Facades\Mail;
use App\Model\Shop;
use App\User;

class ShopController extends Controller
{
    public function store(Request $request)
    {
        //add validation
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'description' => 'required',

        ]);
        // dd($request->all());
        //save db
        $shop=new Shop();
        $shop->name= $request['name'];
        $shop->phone =$request['phone'];
        $shop->country_id =$request['country_id'];
        $shop->city_id =$request['city_id'];
        $shop->address =$request['address'];
        $shop->description =$request['description'];
        $shop->user_id=auth()->user()->id;
        $shop->save();
        //send mail to admin
        $admins = User::whereHas('role', function ($q) {
            $q->where('name', 'admin');
        })->get();
        // Mail::to($admins)->send(new ShopActivationRequest($shop));

    }
    public function show()
    {
        // dd($shop->owner->name. ' welcome to your shop named ', $shop->name);
        $categories=Shop::where('user_id',auth()->user()->id)->first();
        return response()->json(['yourShop'=>$categories]);
    }
}
