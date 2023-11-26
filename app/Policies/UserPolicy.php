<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('view users');
    }

    public function view(User $user, User $model): bool
    {
        return $user->can('view users') || $user->id === $model->id;
    }
}
