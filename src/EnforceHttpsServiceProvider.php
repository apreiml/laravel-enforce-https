<?php

namespace Apreiml\EnforceHttps;

use Illuminate\Support\ServiceProvider;
use URL;

class EnforceHttpsServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->publishes([
            __DIR__.'/config/enforce-https.php' => config_path('enforce-https.php')
        ]);
        $this->mergeConfigFrom(
            __DIR__.'/config/enforce-https.php', 'enforce-https'
        );
    }

    public function boot()
    {
        if (config('enforce-https.enabled')) {
            URL::forceScheme('https');
        }
    }

}
