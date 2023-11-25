<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Contracts\UserService;

class UserController
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function __invoke()
    {
        $user = $this->userService->findById(Auth::id());

        return UserResource::make($user);
    }
}
