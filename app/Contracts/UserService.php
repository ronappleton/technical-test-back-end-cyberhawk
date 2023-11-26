<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Models\User;

interface UserService extends DataService
{
    public function findByUsername(string $username): ?User;

    public function getPermissions(User $user): array;
}
