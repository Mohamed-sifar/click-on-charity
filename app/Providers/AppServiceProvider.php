<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

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
    public function boot()
    {
        // Share the authenticated user's data globally with Inertia
        Inertia::share('auth.user', function () {
            return Auth::user() ? [
                'id' => Auth::user()->user_id,
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'profile_image' => Auth::user()->profile_image,
                // Add other user fields you want to share
            ] : null;
        });
    }
}
