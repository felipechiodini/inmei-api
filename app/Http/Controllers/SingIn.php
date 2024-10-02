<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SingIn
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'document' => 'required',
            'password' => 'required|confirmed',
        ]);

        User::query()->create([
            $request->name,
            $request->email,
            $request->document,
            Hash::make($request->password)
        ]);

        $message = 'Usuário criado com sucesso!';

        return response()
            ->json(compact('message'));
    }
}
