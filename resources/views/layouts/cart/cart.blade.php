@extends('layouts.app')
@section('content')
@php 
    $carts=Cart::getContent();
@endphp 
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table-container">
                    <table class="table table-cart">
                        <thead>
                            <tr>
                                <th class="product-col">Product</th>
                                <th class="price-col">Price</th>
                                <th class="qty-col">Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($carts as $cart)
                        	<form method="post" action="{{route('user.cart.update',$cart->id)}}">
                        		@csrf
	                            <tr class="product-row">
	                                <td class="product-col">
	                                    <figure class="product-image-container">
	                                        <a href="/user/product/show/{{$cart->id}}" class="product-image">
	                                            <img src="{{asset('storage')}}/{{$cart->attributes->image}}" style="width: 50%" alt="product">
	                                        </a>
	                                    </figure>
	                                    <h2 class="product-title">
	                                        <a href="/user/product/show/{{$cart->id}}">{{$cart->name}}</a>
	                                    </h2>
	                                </td>
	                                <td>${{$cart->price}}</td>
	                                <td>
	                                	<span style="display: flex;flex-direction: row;justify-content: center;">
	                                    <input type="number" value="{{$cart->quantity}}" min="12" name="qty">
	                                    <input type="submit" value="Update">
	                                    </span>
	                                </td>
	                                <td>${{$cart->price*$cart->quantity}}</td>
	                            </tr>
	                            <tr class="product-action-row">
	                                <td colspan="4" class="clearfix">
	                                    <!-- <div class="float-left">
	                                        <a href="#" class="btn-move">Move to Wishlist</a>
	                                    </div> -->
	                                    
	                                    <div class="float-right">
	                                        <!-- <a href="#" title="Edit product" class="btn-edit"><span class="sr-only">Edit</span><i class="icon-pencil"></i></a> -->
	                                        <a href="/user/cart/remove/{{$cart->id}}" title="Remove product" class="btn-remove"><span class="sr-only">Remove</span></a>
	                                    </div>
	                                </td>
	                            </tr>
                            </form>
                        @empty
                        @endforelse
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="4" class="clearfix">
                                    <div class="float-left">
                                        <a href="/home" class="btn btn-outline-secondary">Continue Shopping</a>
                                    </div><!-- End .float-left -->

                                    <div class="float-right">
                                        <!-- <a href="#" class="btn btn-outline-secondary btn-clear-cart">Clear Shopping Cart</a> -->
                                        <!-- <a href="#" class="btn btn-outline-secondary btn-update-cart">Update Shopping Cart</a> -->
                                    </div><!-- End .float-right -->
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- <div class="cart-discount">
                    <h4>Apply Discount Code</h4>
                    <form action="#">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Enter discount code"  required>
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-primary" type="submit">Apply Discount</button>
                            </div>
                        </div>
                    </form>
                </div> -->
            </div>

            <div class="col-lg-4">
                <div class="cart-summary">
                    <!-- <h3>Summary</h3>
                    <h4>
                        <a data-toggle="collapse" href="#total-estimate-section" class="collapsed" role="button" aria-expanded="false" aria-controls="total-estimate-section">Estimate Shipping and Tax</a>
                    </h4>
                    <div class="collapse" id="total-estimate-section">
                        <form action="#">
                            <div class="form-group form-group-sm">
                                <label>Country</label>
                                <div class="select-custom">
                                    <select class="form-control form-control-sm">
                                        <option value="USA">United States</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="China">China</option>
                                        <option value="Germany">Germany</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-group-sm">
                                <label>State/Province</label>
                                <div class="select-custom">
                                    <select class="form-control form-control-sm">
                                        <option value="CA">California</option>
                                        <option value="TX">Texas</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-group-sm">
                                <label>Zip/Postal Code</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>

                            <div class="form-group form-group-custom-control">
                                <label>Flat Way</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="flat-rate">
                                    <label class="custom-control-label" for="flat-rate">Fixed $5.00</label>
                                </div>
                            </div>

                            <div class="form-group form-group-custom-control">
                                <label>Best Rate</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="best-rate">
                                    <label class="custom-control-label" for="best-rate">Table Rate $15.00</label>
                                </div>
                            </div>
                        </form>
                    </div> -->

                    <table class="table table-totals">
                        <tbody>
                            <tr>
                                <td>Subtotal</td>
                                <td>${{Cart::getSubTotal()}}</td>
                            </tr>

                            <!-- <tr>
                                <td>Tax</td>
                                <td>$0.00</td>
                            </tr> -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Order Total</td>
                                <td>${{Cart::getTotal()}}</td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="checkout-methods">
                        <a href="/user/checkout" class="btn btn-block btn-sm btn-primary">Go to Checkout</a>
                        <!-- <a href="#" class="btn btn-link btn-block">Check Out with Multiple Addresses</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-6"></div><!-- margin -->
</main>
@endsection
