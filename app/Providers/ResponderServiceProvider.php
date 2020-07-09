<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\Factory as ViewFactory;

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Responder\InterfaceResponder;
use App\Responder\Admin\PostResponder as AdminPostResponder;

class ResponderServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


        // app()->singleton(InterfaceResponder::class, PostResponder::class);
    }

    /*
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       $this->app->when(AdminPostController::class)
        ->needs(InterfaceResponder::class)
        ->give(AdminPostResponder::class);
    }
}
