<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

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
        // Mapping untuk polymorphic relation
        Relation::morphMap([
            'perbaikan'  => 'App\Models\TagihanPerbaikan',
            'pemasangan' => 'App\Models\TagihanPemasangan',
            'berhenti'   => 'App\Models\BerhentiBerlangganan',
        ]);
    }
}
