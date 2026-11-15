<?php

namespace App\Providers;

use App\Mail\Transport\MicrosoftGraphTransport;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Mail::extend('graph', fn (array $config) => new MicrosoftGraphTransport(
            (string) $config['tenant_id'],
            (string) $config['client_id'],
            (string) $config['client_secret'],
            (string) $config['sender'],
        ));
    }
}
