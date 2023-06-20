<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PoolResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'hardware_id' => $this->hardware_id,
            'name' => $this->name,
            'wide' => $this->wide,
            'long' => $this->long,
            'depth' => $this->depth,
            'noted' => $this->noted,
        ];
    }
}
