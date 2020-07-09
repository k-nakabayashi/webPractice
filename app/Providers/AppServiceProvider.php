<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Responder\InterfaceResponder;
use  App\Responder\PostResponder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(InterfaceResponder::class, function ($app) {

            return $obj;
        });

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
