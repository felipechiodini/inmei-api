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
        ]);

        User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'document' => $request->document,
            'password' => Hash::make($request->password)
        ]);

        $message = 'Usuário criado com sucesso!';

        return response()
            ->json(compact('message'));
    }
}
