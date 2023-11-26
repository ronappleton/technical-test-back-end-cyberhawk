<?php

namespace App\Providers;

use App\Models\Component;
use App\Models\ComponentType;
use App\Models\Farm;
use App\Models\Grade;
use App\Models\GradeType;
use App\Models\Inspection;
use App\Models\Turbine;
use App\Models\User;
use App\Policies\ComponentPolicy;
use App\Policies\ComponentTypePolicy;
use App\Policies\FarmPolicy;
use App\Policies\GradesPolicy;
use App\Policies\GradeTypePolicy;
use App\Policies\InspectionPolicy;
use App\Policies\TurbinePolicy;
use App\Policies\UserPolicy;
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
        Inspection::class => InspectionPolicy::class,
        Grade::class => GradesPolicy::class,
        User::class => UserPolicy::class,
        Farm::class => FarmPolicy::class,
        Component::class => ComponentPolicy::class,
        ComponentType::class => ComponentTypePolicy::class,
        GradeType::class => GradeTypePolicy::class,
        Turbine::class => TurbinePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            return $user->hasRole('admin') ? true : null;
        });
    }
}
