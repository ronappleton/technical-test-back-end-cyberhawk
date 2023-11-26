<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ComponentType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComponentTypePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('view component types');
    }

    public function view(User $user, ComponentType $componentType): bool
    {
        return $user->can('view component types');
    }
}
