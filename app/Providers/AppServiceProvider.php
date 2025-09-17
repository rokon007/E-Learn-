<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

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
        Livewire::component('frontend.landing.auth.registration', \App\Livewire\Frontend\Landing\Auth\Registration::class);
        Livewire::component('frontend.landing.auth.login', \App\Livewire\Frontend\Landing\Auth\Login::class);
    }
}
