<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\TokenRequest;
use App\Models\User;
use Hash;

class TokenController
{
    public function __invoke(TokenRequest $request)
    {
        $user = User::where('username', $request->get('username'))->first();

        if (!$user || !Hash::check($request->get('password'), $user->password)) {
            return response()->json([
                "code" => 401,
                "message" => "The provided credentials are incorrect.",
            ], 401);
        }

        return $user->createToken('Token')->plainTextToken;
    }
}
