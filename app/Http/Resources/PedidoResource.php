<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PedidoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $data=[
            "id"=>$this->id,
            "nome_completo"=>$this->nome_completo,
            "nome_mae"=>$this->nome_mae,
            "email"=>$this->email,
            "data_nascimento"=>$this->data_nascimento,
            "data_batismo"=>$this->data_batismo,
            "finalidade"=>$this->finalidade,
            "status"=>$this->status,
            "diocese_id"=>$this->diocese_id,
            "cidade_id"=>$this->cidade_id,
            "paroquia_id"=>$this->paroquia_id
        ];
        return $data;
    }
}
