<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProcedimentoResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'codigo' => $this->codigo,
            'descricao_curta' => $this->descricao_curta,
            'descricao_longa' => $this->descricao_longa,
            'descricao_personalizada' => $this->descricao ? $this->descricao->descricao_personalizada : null,
            'tags' => $this->tags->map(function ($item) {
                return [
                    'id'=>$item->id,
                    'nome'=>$item->nome,
                ];
            }),
            'favorito' => count($this->favoritos)
        ];
    }
}
