<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingIn
{
    public function __invoke(Request $request)
    {
        if (! $token = auth()->attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = auth()->user();

        $message = 'Usuário criado com sucesso!';

        return response()
            ->json(compact('message', 'user', 'token'));
    }
}
