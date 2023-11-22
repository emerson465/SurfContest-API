<?php

namespace App\Http\Controllers;

use App\Models\Onda;
use App\Models\Bateria;
use App\Models\Surfista;
use App\Http\Resources\OndaResource;
use App\Http\Resources\BateriaResource;
use App\Http\Requests\StoreBateriaRequest;

class BateriaController extends Controller
{

    public function store(StoreBateriaRequest $request)
    {
        $bateria = Bateria::create($request->validated());
        return BateriaResource::make($bateria);
    }

    public function cadastrarNovasOndas($bateriaId)
    {
        $novasOndas = [];

        $bateria = Bateria::findOrFail($bateriaId);

        $surfistas = [$bateria->Surfista1, $bateria->Surfista2];

        foreach ($surfistas as $surfista) {
            $novaOnda = Onda::create([
                'Bateria' => $bateriaId,
                'Surfista' => $surfista,
            ]);

            $novasOndas[] = new OndaResource($novaOnda);
        }

        return response()->json($novasOndas, 201);
    }

    public function obterPontuacao($surfista, $ondasIds)
    {

        $notasSurfista = $surfista->notas->whereIn('Onda', $ondasIds);

        $notas = [];

        foreach ($notasSurfista as $nota) {
            $media = ($nota->notaParcial1 + $nota->notaParcial2 + $nota->notaParcial3) / 3;
            array_push($notas, $media);
        }

        rsort($notas);

        $pontuacaoSurfista = array_sum(array_slice($notas, 0, 2));

        return $pontuacaoSurfista;
    }

    public function obterVencedor($bateriaId)
    {

        $bateria = Bateria::find($bateriaId);
        $ondasIds = $bateria->ondas->pluck('id');

        $surfista1 = Surfista::where('número', $bateria->Surfista1)->first();
        $surfista2 = Surfista::where('número', $bateria->Surfista2)->first();

        $pontuacaoSurfista1 = $this->obterPontuacao($surfista1, $ondasIds);
        $pontuacaoSurfista2 = $this->obterPontuacao($surfista2, $ondasIds);


        // Compara as pontuações para determinar o vencedor
        if ($pontuacaoSurfista1 > $pontuacaoSurfista2) {
            return response()->json($surfista1, 200);
        } elseif ($pontuacaoSurfista2 > $pontuacaoSurfista1) {
            return response()->json($surfista2, 200);
        } else {
            return "Houve um empate!";
        }
    }
}
