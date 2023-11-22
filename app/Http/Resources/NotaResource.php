<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'Onda' => $this->Onda,
            'notaParcial1' => $this->notaParcial1,
            'notaParcial2' => $this->notaParcial2,
            'notaParcial3' => $this->notaParcial3
        ];
    }
}
