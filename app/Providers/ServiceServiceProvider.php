<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\FarmService as FarmServiceContract;
use App\Services\FarmService;
use App\Contracts\TurbineService as TurbineServiceContract;
use App\Services\TurbineService;
use App\Contracts\InspectionService as InspectionServiceContract;
use App\Services\InspectionService;
use App\Contracts\GradeTypeService as GradeTypeServiceContract;
use App\Services\GradeTypeService;
use App\Contracts\ComponentTypeService as ComponentTypeServiceContract;
use App\Services\ComponentTypeService;
use App\Contracts\ComponentService as ComponentServiceContract;
use App\Services\ComponentService;
use App\Contracts\GradeService as GradeServiceContract;
use App\Services\GradeService;
use App\Contracts\UserService as UserServiceContract;
use App\Services\UserService;

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
        $this->app->bind(InspectionServiceContract::class, InspectionService::class);
        $this->app->bind(GradeTypeServiceContract::class, GradeTypeService::class);
        $this->app->bind(ComponentTypeServiceContract::class, ComponentTypeService::class);
        $this->app->bind(ComponentServiceContract::class, ComponentService::class);
        $this->app->bind(GradeServiceContract::class, GradeService::class);
        $this->app->bind(UserServiceContract::class, UserService::class);
    }
}
