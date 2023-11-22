<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\FarmService as FarmServiceContract;
use App\Services\FarmService;
use App\Contracts\TurbineService as TurbineServiceContract;
use App\Services\TurbineService;

class ServiceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // ...
    }

    public function boot(): void
    {
        $this->app->bind(FarmServiceContract::class, FarmService::class);
        $this->app->bind(TurbineServiceContract::class, TurbineService::class);
    }
}
