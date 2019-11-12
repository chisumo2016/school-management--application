<?php

namespace App\Providers;


use App\HeaderFooter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use View;

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
        View::composer('admin.partials.nav', function ($view){
            $user = Auth::user();
            $view->with('user',$user);
        });

        View::composer('admin.partials.header', function ($view){
            $header = HeaderFooter::find(2);
            $view->with('header',$header);
        });

        View::composer('admin.partials.footer', function ($view){
            $footer = HeaderFooter::find(2);
            $view->with('footer',$footer);
        });
    }
}
