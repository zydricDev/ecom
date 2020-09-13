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
        View::composer(['cart.itemsPending'],function($view){
          $view->with('content2', Shop::where('user_id', auth()->user()->id)->get()->where('confirmed','1')->where('delivered','0'));
        });
    }
}
