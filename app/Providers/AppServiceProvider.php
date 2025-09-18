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
        // Livewire কম্পোনেন্টগুলি রেজিস্টার করুন
        Livewire::component('admin.user-management', \App\Livewire\Backend\Admin\UserManagement::class);

        // Excel ফ্যাসাড রেজিস্টার করুন (যদি প্রয়োজন হয়)
        $this->app->register(\Maatwebsite\Excel\ExcelServiceProvider::class);
        $this->app->bind('excel', function () {
            return new \Maatwebsite\Excel\Excel();
        });
    }
}
