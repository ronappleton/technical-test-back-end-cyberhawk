<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Turbine;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TurbinePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('view turbines');
    }

    public function view(User $user, Turbine $turbine): bool
    {
        return $user->can('view turbines');
    }
}
