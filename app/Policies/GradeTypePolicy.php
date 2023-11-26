<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\GradeType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GradeTypePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('view grade types');
    }

    public function view(User $user, GradeType $gradeType): bool
    {
        return $user->can('view grade types');
    }
}
