<?php

declare(strict_types=1);

namespace App\Services;

use App\Abstracts\DataService;
use App\Models\User;

class UserService extends DataService implements \App\Contracts\UserService
{
    protected string $model = User::class;
}
