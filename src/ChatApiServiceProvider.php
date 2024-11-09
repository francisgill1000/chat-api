<?php

namespace Francis\ChatApi;

use Illuminate\Support\ServiceProvider;

class ChatApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->publishes([
            __DIR__ . '/config/chatapi.php' => config_path('chatapi.php'),
        ]);
    }

    public function register()
    {
        // $this->mergeConfigFrom(
        //     __DIR__ . '/config/chatapi.php', 'chatapi'
        // );
    }
}
