<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Http\Middleware\CekLevel;

class RouteServiceProvider extends ServiceProvider
{
public function boot(): void
{
    Route::aliasMiddleware('ceklevel', CekLevel::class);
}

}

