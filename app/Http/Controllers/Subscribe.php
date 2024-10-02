<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PagarMe\Client;

class Subscribe
{
    public function __invoke(Request $request)
    {
        $user = $request->user();

        $client = new Client('ssssssssssss');

        $message = 'Usuário criado com sucesso!';

        return response()
            ->json(compact('message'));
    }
}
