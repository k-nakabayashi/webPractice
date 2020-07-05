<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidationProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('double_space', function ($attribute, $value, $parameters, $validator) {
            $strip = trim(mb_convert_kana($value, "s", 'UTF-8'));

            if (empty($strip)) {
                return false;
            }
            return true;
        });
        //}, 'スペースは入力できません');
    }
}
