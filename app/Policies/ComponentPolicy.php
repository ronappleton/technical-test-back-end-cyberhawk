<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Component;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComponentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('view components');
    }

    public function view(User $user, Component $component): bool
    {
        return $user->can('view components');
    }
}
