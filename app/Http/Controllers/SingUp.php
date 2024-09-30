<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SingUp extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'min:6'],
            'cellphone' => ['required'],
        ]);

        User::query()
            ->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'cellphone' => $request->cellphone
            ]);

        $message = 'Usuario criado com sucesso';

        $token = auth()->attempt(['email' => $request->email, 'password' => $request->password]);

        $user = auth()->user();

        return response()
            ->json(compact('message', 'user', 'token'));
    }

}
