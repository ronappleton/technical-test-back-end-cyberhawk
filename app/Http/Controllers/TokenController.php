<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\UserService;
use App\Http\Requests\TokenRequest;
use Hash;

class TokenController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function __invoke(TokenRequest $request)
    {
        $user = $this->userService->findByUsername($request->get('username'));

        if (!$user || !Hash::check($request->get('password'), $user->password)) {
            return response()->json([
                "code" => 401,
                "message" => "The provided credentials are incorrect.",
            ], 401);
        }

        return [
            'access_token' => $user->createToken('Token')->plainTextToken,
            'permissions' => $this->userService->getPermissions($user),
        ];
    }
}
