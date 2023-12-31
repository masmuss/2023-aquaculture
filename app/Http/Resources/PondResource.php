<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PondResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'regency_id' => $this->regency_id,
            'name' => $this->name,
            'address' => $this->address,
            'pools' => PoolResource::collection($this->whenLoaded('pools')),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
