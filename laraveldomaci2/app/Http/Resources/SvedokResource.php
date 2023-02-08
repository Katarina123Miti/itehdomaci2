<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SvedokResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='svedok';

    public function toArray($request)
    {
        return [
            'datumIVreme' => $this->resource->datumIVreme,
            'user' => $this->resource->user,
            'krivicnodelo' => $this->resource->krivicnodelo,
            'sudija' => $this->resource->sudija,
            'note' => $this->resource->note,
        ];
    }
}
