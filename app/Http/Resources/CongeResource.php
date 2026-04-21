<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CongeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_conge,
            'date_debut' => $this->date_debut,
            'date_fin' => $this->date_fin,
            'type_conge' => $this->type_conge,
            'id_personnel' => $this->id_personnel,
        ];
    }
}
