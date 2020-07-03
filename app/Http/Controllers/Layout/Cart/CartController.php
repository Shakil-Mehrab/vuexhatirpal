<?php

namespace App\Http\Controllers\Layout\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Coupon;
use App\Model\Order;
use App\Model\Country;
use Cart;
use Auth;
use Mail;
use Session;

class CartController extends Controller
{
public function index(){
    $categories=Cart::getContent();
    return response()->json(['cartContent'=>$categories],200);
}
public function cartCount(){
    $categories=Cart::getContent()->count();
    return response()->json(['cartCount'=>$categories],200);
}
public function subTotal(){
    $categories=Cart::getSubTotal();
    return response()->json(['cartSubTotal'=>$categories],200);
}
public function cartTotal(){
    $categories=Cart::getTotal();
    return response()->json(['cartTotal'=>$categories],200);
}
public function country(){
    $categories=Country::orderBy('id','desc')->get();
    return response()->json(['selectAllCountry'=>$categories],200);
}
public function addItem($id){
  $product=Product::find($id);
//   dd($product);
     \Cart::add([
        'id' => $id,
        'name' => $product->name,
        'price' => $product->price,
        'quantity' => 1,
        'attributes' => array(
        'image' => $product->cover_img,
        ),
        // 'associatedModel' => $product
    ]);
    // return back();
}
public function update(Request $request, $id){
  $product=Product::find($id);
  $subtotal=Cart::getSubTotal();
//   dd(request('qty'));
//   if($request->quantity<$product->min_order){return back()->withError('Order Minimum'.$product->min_order);}
    Cart::update($id,array(
        'quantity'=>array(
            'relative' => false,
            'value'=>request('qty'),
            ),
        // 'attributes' => array(
        //     'size' => $request->size,
        //     'image' => $product->image1,
        //     'vat' => $product->vat,
        //      ),
        ));
    return back()->withSuccess('Cart Updated !');
}

public function destroy($id){
  Cart::remove($id);
  return back()->withSuccess('Cart Removed !');
}

//shipping
public function store(Request $request)
    {
        $request->validate([
            'shipping_fullname' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'shipping_address' => 'required',
            'shipping_phone' => 'required',
            'shipping_zipcode' => 'required',
            'payment_method' => 'required',
        ]);
        $order = new Order();
        $order->order_number = uniqid('OrderNumber-');
        $order->shipping_fullname = $request->input('shipping_fullname');
        $order->country_id = $request->input('country_id');
        $order->city_id = $request->input('city_id');
        $order->shipping_address = $request->input('shipping_address');
        $order->shipping_phone = $request->input('shipping_phone');
        $order->shipping_zipcode = $request->input('shipping_zipcode');
        $order->notes = $request->input('notes');

        // dd($request->input('billing_fullname'));

        if(empty($request->input('billing_fullname'))) {

            $order->billing_fullname = $request->input('shipping_fullname');
            $order->billing_country_id = $request->input('country_id');
            $order->billing_city_id = $request->input('city_id');
            $order->billing_address = $request->input('shipping_address');
            $order->billing_phone = $request->input('shipping_phone');
            $order->billing_zipcode = $request->input('shipping_zipcode');
        }else {
            $request->validate([
                'billing_fullname' => 'required',
                'billing_country_id' => 'required',
                'billing_city_id' => 'required',
                'billing_address' => 'required',
                'billing_phone' => 'required',
                'billing_zipcode' => 'required',
            ]);
            $order->billing_fullname = $request->input('billing_fullname');
            $order->billing_country_id = $request->input('billing_country_id');
            $order->billing_city_id = $request->input('billing_city_id');
            $order->billing_address = $request->input('billing_address');
            $order->billing_phone = $request->input('billing_phone');
            $order->billing_zipcode = $request->input('billing_zipcode');
        }

// dd(request('payment_method'));
        $order->grand_total = \Cart::getTotal();
        $order->item_count = \Cart::getContent()->count();
        $order->user_id = auth()->id();

        if (request('payment_method') == 'paypal') {
            $order->payment_method = 'paypal';
        }
        $order->save();
        //save order items
        $cartItems =Cart::getContent();
        foreach($cartItems as $item) {
            // dd($item);
            $order->items()->attach($item->id, ['price'=> $item->price, 'quantity'=> $item->quantity]);
            $product=Product::find($item->id);
            $product->sale_count=$product->sale_count+1;
            $product->update();

        }
        // dd(request('payment_method'));

        //payment
        if(request('payment_method') == 'paypal') {
                //redirect to paypal
            return redirect()->route('paypal.checkout', $order->id);
        }
        //empty cart
        \Cart::clear();
        //send email to customer
        // return redirect()->route('temporary')->withMessage('Order has been placed');

    }
    public function applyCoupon(Request $request){
        $couponCode = $request['coupon_code'];
        $couponData = Coupon::where('code', $couponCode)->first();
        if(!$couponData) {
            return back()->withMessage('Sorry! Coupon does not exist');
        }
        // dd($couponData);
        //coupon logic
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => $couponData->name,
            'type' => $couponData->type,
            'target' => 'total',
            'value' => $couponData->value,
        ));
        Cart::condition($condition); // for a speicifc user's cart
        return back()->withMessage('coupon applied');
    }
}

