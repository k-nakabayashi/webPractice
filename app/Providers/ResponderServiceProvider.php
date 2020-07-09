<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Admin\PostController as AdminPostController;

use App\Responder\InterfaceResponder;
use App\Responder\PostResponder;

class ResponderServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->when(AdminPostController::class)
        // ->needs(InterfaceResponder::class)
        // ->give(function () {
        //     return PostResponder::class;
        // });

        // $this->app->bind(
        //     InterfaceResponder::class,
        //     PostResponder::class
        // );
    }

    /*
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
