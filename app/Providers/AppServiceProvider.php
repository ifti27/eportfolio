<?php

namespace App\Providers;

use App\Models\Profile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            static $sharedProfile = null;
            if ($sharedProfile === null && Schema::hasTable('profiles')) {
                try {
                    $sharedProfile = Profile::first();
                } catch (\Throwable $e) {
                    $sharedProfile = null;
                }
            }
            $view->with('profile', $sharedProfile);
        });
    }
}
