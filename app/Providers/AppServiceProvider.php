<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Cookie;
use Illuminate\Support\Facades\Cookie;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $file = app_path('Helpers/Helper.php');
        if (file_exists($file)) {
            require_once($file);
        }

        $viewweb = Cookie::queue('viewweb', null , 1); 
        View()->share('viewweb', $viewweb);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
