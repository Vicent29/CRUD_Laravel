<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_table' => $this->id_table,
            'id_user' => $this->id_user,
            'is_confirmed' => $this->is_confirmed,
        ];
    }
}