<?php

namespace Muscobytes\CdekWebhook\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CdekWebhookServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/cdek.php', 'cdek'
        );
    }


    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../config/cdek.php' => config_path('cdek.php'),
            ]);
        }

        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
    }

}