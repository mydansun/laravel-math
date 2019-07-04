<?php

namespace Mydansun\Math\Providers;

use Mydansun\Math\Math;

class MathServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton('math', function ($app) {
            return new Math();
        });
    }

    public function provides()
    {
        return ['math'];
    }
}