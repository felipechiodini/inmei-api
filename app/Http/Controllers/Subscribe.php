<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PagarMe\Client;
use PagarMe\PagarMe;

class Subscribe
{
    public function __invoke(Request $request,  $service)
    {
        $user = $request->user();

        $client = new Client('ssssssssssss');


        $message = 'Usuário criado com sucesso!';

        return response()
            ->json(compact('message'));
    }
}
