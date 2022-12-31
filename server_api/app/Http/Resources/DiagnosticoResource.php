<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiagnosticoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'codigo' => $this->codigo,
            'descricao_curta' => $this->descricao_curta,
            'descricao_longa' => $this->descricao_longa,
            'descricao_personalizada' => $this->descricao ? $this->descricao->descricao_personalizada : null,
            'tags' => $this->tags ? $this->tags->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nome' => $item->nome,
                ];
            }) : [],
            'favorito' => $this->favoritos ? count($this->favoritos) : 0
        ];
    }
}
