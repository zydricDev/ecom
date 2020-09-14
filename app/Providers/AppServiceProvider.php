<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Models\Shop;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['cart.items'],function($view){
          $view->with('content', Shop::where('user_id', auth()->user()->id)->get()->where('confirmed','0'));
        });

        View::composer(['cart.itemsPending'],function($view){
          $view->with('pendingList', Shop::where('user_id', auth()->user()->id)->get()->where('confirmed','1')->where('delivered','0'));
        });

        View::composer(['cart.itemsDeliver'],function($view){
          $view->with('pendingList', Shop::where('seller_id', auth()->user()->id)->get()->where('confirmed','1')->where('delivered','0'));
        });

        View::composer(['cart.itemsHistory'],function($view){
          $view->with('deliveredList', Shop::where('seller_id', auth()->user()->id)->get()->where('confirmed','1')->where('delivered','1'));
          $view->with('recievedList', Shop::where('user_id', auth()->user()->id)->get()->where('confirmed','1')->where('delivered','1'));
        });
    }
}
