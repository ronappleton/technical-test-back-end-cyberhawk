<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Inspection;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InspectionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view inspections');
    }

    public function view(User $user, Inspection $inspection): bool
    {
        return $user->hasPermissionTo('view inspections');
    }
}
