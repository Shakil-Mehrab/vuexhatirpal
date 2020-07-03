<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Model\Category;
use App\Http\View\Composers\GlobalComposer;
use Illuminate\Support\Facades\Schema;
use App\Model\Shop;
use App\Observers\ShopObserver;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Voyager::useModel('Category', \App\Model\Category::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // ///////////option 1
        // View::share('cats',Category::all());
        // ///////////option2
        // View::composer(['welcome'],function($view){
        // $view->with('cats',Category::all());
        // ///////////option3
        // View::composer(['welcome'],GlobalComposer::class);
        // Schema::defaultStringLength(191);
        Shop::observe(ShopObserver::class);
    }
}
