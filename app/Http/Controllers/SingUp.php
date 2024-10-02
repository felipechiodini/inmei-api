<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SingUp
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'document' => 'required',
            'password' => 'required',
            'cellphone' => 'required',
        ]);

        User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'document' => $request->document,
            'password' => Hash::make($request->password),
            'cellphone' => $request->cellphone,
        ]);

        $message = 'Usuário criado com sucesso!';
        $token = auth()->attempt(request(['email', 'password']));
        $user = auth()->user();

        return response()
            ->json(compact('message', 'user', 'token'));
    }
}
