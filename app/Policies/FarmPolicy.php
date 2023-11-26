<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Farm;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FarmPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('view farms');
    }

    public function view(User $user, Farm $farm): bool
    {
        return $user->can('view farms');
    }
}
