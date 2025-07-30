<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Broadcast::routes();

        /*
         * Register your broadcast channels here.
         */
        Broadcast::channel('certificate-status', function () {
            return true; // Public channel, allow all
        });
    }
}
