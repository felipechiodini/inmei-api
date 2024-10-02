<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingUp
{
    public function __invoke(Request $request)
    {
        $token = auth()->login($request->only(['email', 'password']));

        $user = auth()->user();

        $message = 'Usuário criado com sucesso!';

        return response()
            ->json(compact('message', 'user', 'token'));
    }
}
