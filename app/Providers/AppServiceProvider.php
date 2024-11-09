<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
        Blade::if('role', function (string $value) {
            return Str::of($value)->explode('|')->contains(function (string $value) {
                return Auth::user()->role->name === $value;
            });
        });

        Carbon::setLocale('id_ID');
    }
}
