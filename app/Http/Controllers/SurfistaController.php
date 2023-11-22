<?php

namespace App\Http\Controllers;

use App\Models\Surfista;
use App\Http\Resources\SurfistaResource;
use App\Http\Requests\StoreSurfistaRequest;
use App\Http\Requests\UpdateSurfistaRequest;

class SurfistaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSurfistaRequest $request)
    {
        //
        $surfista = Surfista::create($request->validated());
        return SurfistaResource::make($surfista);
    }
}
