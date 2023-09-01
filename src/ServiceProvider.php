<?php

namespace Youer\LaravelJdSdk;

use Illuminate\Contracts\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        $config = __DIR__ . '/config.php';
        if ($this->app instanceof LaravelApplication &&
            $this->app->runningInConsole()) {
            $this->publishes([
                $config => config_path('jd.php')
            ]);
        }
        $this->mergeConfigFrom($config, 'jd');
    }
}
