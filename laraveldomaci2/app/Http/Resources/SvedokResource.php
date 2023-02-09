<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\KrivicnoDeloResource;
use App\Http\Resources\SudijaResource;

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
            'user' => new UserResource($this->resource->userkey),
            'krivicnodelo' => new KrivicnoDeloResource($this->resource->krivicnodelokey),
            'sudija' => new SudijaResource($this->resource->sudijakey),
            'note' => $this->resource->note,
        ];
    }
}
