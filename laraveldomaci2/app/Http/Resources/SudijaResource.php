<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SudijaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='sudija';

    public function toArray($request)
    {
        return [
            'ime' => $this->resource->ime,
            'brojTelefona' => $this->resource->brojTelefona,
            'godineIskustva' => $this->resource->godineIskustva,
            'email' => $this->resource->email,

        ];
    }
}
