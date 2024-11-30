<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use App\Models\ServiceRequestDocument;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class RequestIncomeTaxService
{
    public function __invoke(Request $request)
    {
        $serviceRequest = ServiceRequest::query()
            ->create([
                'name' => $request->name,
                'email' => $request->email,
                'document' => $request->document,
                'cellphone' => $request->cellphone
            ]);

        $request->collect('documents')
            ->each(function (UploadedFile $document) use ($serviceRequest) {
                ServiceRequestDocument::query()
                    ->create([
                        'service_request_id' => $serviceRequest->id,
                        'name' => $document->getClientOriginalName(),
                        'link' => $document->store('documents')
                    ]);
            });

        $message = 'Serviço solicitado com sucesso!';

        return response()
            ->json(compact('message'));
    }
}
