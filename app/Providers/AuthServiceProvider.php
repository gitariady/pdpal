<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('akses-menu-1', function ($user) {
            return in_array($user->level, ['admin', 'supervisor']);
        });
        Gate::define('akses-menu-4', function ($user) {
            return in_array($user->level, ['petugas','admin']);
        });
        Gate::define('akses-menu-2', function ($user) {
            return in_array($user->level, ['supervisor', 'petugas']);
        });
        Gate::define('akses-menu-3', function ($user) {
            return in_array($user->level, ['supervisor']);
        });
    }

}
