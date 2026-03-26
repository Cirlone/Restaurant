<?php

namespace App\Providers;

use App\Providers\Filament\AdminPanelProvider;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(AdminPanelProvider::class);
    }
}
