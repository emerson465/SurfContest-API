<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Http\Resources\NotaResource;
use App\Http\Requests\StoreNotaRequest;
use App\Http\Requests\UpdateNotaRequest;

class NotaController extends Controller
{
    public function cadastrarNovasNotas(StoreNotaRequest $request, $ondaId)
    {
        $data = array_merge(['Onda' => $ondaId], $request->validated());

        $novasNotas = Nota::create($data);

        $novasNotas = new NotaResource($novasNotas);

        return response()->json($novasNotas, 201);
    }
}
