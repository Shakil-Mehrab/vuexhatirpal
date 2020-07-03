<?php
Route::get('/','Layout\FrontController@index')->name('logout');
Route::get('/search','Layout\FrontController@searchPost');


//adding help
Route::get('/adding/help/country','Layout\AddingHelpController@country');
Route::get('/verify','Auth\SendOtpCodeController@index')->name('getverify');
Route::post('/verify','Auth\SendOtpCodeController@postVerify')->name('verify');

//Pavilion
Route::get('/pavilion','Layout\PavilionController@index');
Route::get('/pavilion/country/show/{country_id}','Layout\PavilionController@show')->name('pavilion.country.show');

//Single and count & quick
// Route::resource('/count','Layout\CountDownController');

//pop,renent,cat,abt,contact
Route::get('/about/us','Layout\AboutController@about');
Route::get('/helpline','Layout\AboutController@contact');
Route::get('/helpline','Layout\AboutController@helpline');
Route::get('/terms/condition','Layout\AboutController@condition');
Route::get('/moneyback','Layout\AboutController@moneyback');
Route::get('/how/to/order','Layout\AboutController@howToOrder');


//Terms & Condition
Route::get('/payment/condition','Layout\TermsAndConditionController@paymentcondition')->name('payment.condition');
Route::get('/policy','Layout\TermsAndConditionController@policy')->name('policy');
// Route::post('/subscribe','Layout\SubscriberController@subscribe')->name('subscribe');

//Rating
// Route::resource('/rating','Layout\RatingController');
// Route::post('/rating/show','Layout\RatingController@show');

//faq,map,banner
// Route::resource('/blog','Layout\BlogController');
// Route::get('/faq','Layout\AboutController@faq')->name('front.faq');
// Route::get('/sitemap','Layout\AboutController@sitemap')->name('front.sitemap');
// Route::get('/banner','Layout\AboutController@banner')->name('front.banner');


//notification
Route::get('/markAsRead', function(){
auth()->user()->unreadNotifications->markAsRead();
});




//temporary
Route::get('/temporary','Layout\FrontController@temporary')->name('temporary');
// Route::get('/comming/soon','Layout\CountDownController@commingsoon')->name('coming.soon');

Auth::routes();
// Route::get('/verifyEmailFirst', 'Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');//verife page
// Route::get('/sentEmailVerifying/{email}/{verifyToken}','Auth\RegisterController@sentEmailVerifying')->name('sentEmailVerifying');//by clicking on gmail link
// Route::get('/resend/verifyEmailFirst/{thisUser}', 'Auth\RegisterController@sendEmail')->name('verification.resend');
Route::get('/home', 'HomeController@index')->name('home');




Route::group(['prefix'=>'user','middleware'=>['auth']],function(){
    Route::get('/category','Layouts\CategoryController@index');
    Route::get('/featured','Layouts\CategoryController@featured');
    Route::get('/fashion','Layouts\CategoryController@fashionProduct');

    Route::get('/slide','Layouts\CategoryController@frontSlide');
    Route::get('/cat/products/{cat_id}','Layouts\CategoryController@show');
    Route::get('/search/cat_product/{cat_id}','Layouts\CategoryController@searchByCat');


    ////nav
    Route::get('/nav/search','Layouts\ProductController@searcByNav');
    ////search.vue page
    Route::get('/all/product','Layouts\ProductController@allProduct');
    Route::get('/real/search','Layouts\ProductController@realSearch');
///wish compare
    Route::get('/wish/list','Layouts\WishController@allWishProduct');
    Route::get('/wish/add/{id}','Layouts\WishController@wishStore');
    Route::get('/wish/remove/{id}','Layouts\WishController@removeWish');


    Route::get('/compare/list','Layouts\WishController@allCompareProduct');
    Route::get('/compare/add/{id}','Layouts\WishController@compareStore');
    Route::get('/compare/remove/{id}','Layouts\WishController@removeCompare');


//////shop page
    Route::get('/shops/show','Layouts\ShopController@show');///creating new shop checking
    Route::post('/shops/store','Layouts\ShopController@store');




    Route::get('/country','Layouts\CountryController@country');
    Route::get('/city/{id}','Layouts\CountryController@city');
    // Route::get('/district/{id}','Layouts\MemberShipController@district');

    Route::get('/best/product','Layouts\ProductController@bestProduct');
    Route::get('/recent/product','Layouts\ProductController@recentProduct');
    Route::get('/popular/product','Layouts\ProductController@popularProduct');

    Route::get('/toprated/product','Layouts\ProductController@topRatedProduct');
    Route::get('/best/sale','Layouts\ProductController@bestSale');
    Route::get('/discount','Layouts\ProductController@discount');
    Route::get('/discount/all/product','Layouts\ProductController@discountAllProduct');
    Route::get('/discount/product/{id}','Layouts\ProductController@discountProduct');
    Route::get('/search/discount/product/{id}','Layouts\ProductController@searchDiscountProduct');





    Route::get('/products/show/{id}','Layouts\ProductController@show');
	Route::get('/same/products/show/{id}','Layouts\ProductController@sameProduct');
    Route::get('/related/product/{id}','Layouts\ProductController@relatedProduct');


        // all about cart
    Route::get('/cart','Layout\Cart\CartController@index');
    Route::get('/cart/add/{id}','Layout\Cart\CartController@addItem');
    Route::get('/cart/count','Layout\Cart\CartController@cartCount');
    Route::get('/cart/subtotal','Layout\Cart\CartController@subTotal');
    Route::get('/cart/total','Layout\Cart\CartController@cartTotal');
    Route::get('/cart/remove/{id}','Layout\Cart\CartController@destroy');
    Route::post('/cart/update/{id}','Layout\Cart\CartController@update');



    Route::post('/apply-coupon/cart', 'Layout\Cart\CartController@applyCoupon');
    Route::post('/orders/store','Layout\Cart\CartController@store');
});



Route::group(['prefix'=>'product','middleware'=>['auth']], function () {

//   Route::get('/payment/method','Layout\Cart\CartController@PaymentMethod')->name('payment.method');
//   Route::post('/card/payment/store','Layout\Cart\CartController@CardPaymentStore')->name('payment.card.store');
//   Route::post('/handcash/payment/store','Layout\Cart\CartController@HandCashPaymentStore')->name('payment.handcash.store');
//   Route::post('/transaction/no/{order_id}','Layout\Cart\CartController@TransactionNo')->name('payment.transation_no.update');
//   Route::get('/confirm/order','Layout\Cart\CartController@ConfirmOrder');
//   Route::post('/confirm/order','Layout\Cart\CartController@ConfirmOrder')->name('confirm.order');
//   Route::get('/thank/to','Layout\Cart\CartController@ThankTo');


});

  Route::get('paypal/checkout/{order}', 'Layout\Cart\PayPalController@getExpressCheckout')->name('paypal.checkout')->middleware('auth');
  Route::get('paypal/checkout-success/{order}', 'Layout\Cart\PayPalController@getExpressCheckoutSuccess')->name('paypal.success')->middleware('auth');
  Route::get('paypal/checkout-cancel', 'Layout\Cart\PayPalController@cancelPage')->name('paypal.cancel')->middleware('auth');
  Route::get('/products/search', 'Layouts\ProductController@search')->name('products.search');




Route::get('/cities','Layout\CascadeDropdownController@show');
Route::get('/codes','Layout\CascadeDropdownController@codeShow');
Route::get('/districts','Layout\CascadeDropdownController@districtShow');
Route::get('/areas','Layout\CascadeDropdownController@areasShow');

// Route::get('/paypal/checkout/{order}', 'Layout\Cart\PayPalController@index')->name('paypal.checkout');
Route::get('/paypal/button', 'Layout\Cart\PayPalController@button');
Route::get('/execute-payment', 'Layout\Cart\PayPalController@execute');
Route::post('/create-payment', 'Layout\Cart\PayPalController@create')->name('create-payment');
Route::get('/creat-payment', 'Layout\Cart\PayPalController@create')->name('creat-payment');

Route::post('/cancel', 'Layout\Cart\PayPalController@calcel');





Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
