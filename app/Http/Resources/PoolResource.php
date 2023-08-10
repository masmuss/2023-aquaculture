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
            'hardware_id' => $this->hardware_id,
            'pond_id' => $this->pond_id,
            'name' => $this->name,
            'wide' => $this->wide,
            'long' => $this->long,
            'depth' => $this->depth,
            'noted' => $this->noted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'samplings' => RecordResource::collection($this->whenLoaded('samplings')),
            'monitorings' => RecordResource::collection($this->whenLoaded('monitorings')),
        ];
    }
}
