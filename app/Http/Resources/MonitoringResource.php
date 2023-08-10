<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MonitoringResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'hardware_id' => $this->hardware_id,
            'pool_id' => $this->pool_id,
            'time' => $this->time,
            'temperature' => $this->temperature,
            'ph' => $this->ph,
            'salinity' => $this->salinity,
            'do' => $this->do,
        ];
    }
}
