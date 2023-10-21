<?php

namespace Agent306\FormComposer\Providers;

use Agent306\FormComposer\Composer;
use Illuminate\Support\ServiceProvider;

class FormComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
    */
    public function register()
    {
        //
        $this->app->bind('form-composer',function(){
            return new Composer();
        });
    }
}