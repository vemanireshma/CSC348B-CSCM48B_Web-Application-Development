<?php

namespace App\Services;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\ServiceProvider;

class WebServiceConnectorProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(HttpClient::class, function () {
            return new HttpClient([
                'base_uri' => 'https://api.twitter.com',
                'headers' => ['Authorization' => 'Bearer ' . config('services.api_key')]
            ]);
        });
    }
}
