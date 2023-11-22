<?php

namespace App\Http\Controllers;

use App\Models\Surfista;
use App\Http\Resources\SurfistaResource;
use App\Http\Requests\StoreSurfistaRequest;
use App\Http\Requests\UpdateSurfistaRequest;

class SurfistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return SurfistaResource::collection(Surfista::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSurfistaRequest $request)
    {
        // Crie e salve o modelo
        $surfista = Surfista::create($request->validated());

        // Use a Resource para transformar o resultado na resposta JSON
        $surfistaResource = new SurfistaResource($surfista);
        $surfistaResource->número;

        return response()->json($surfistaResource->número, 201);
    }
}
