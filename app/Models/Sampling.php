<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sampling extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'hardware_id',
        'pool_id',
        'time',
        'temperature',
        'ph',
        'salinity',
        'do',
    ];

    public function hardware(): BelongsTo
    {
        return $this->belongsTo(Hardware::class);
    }
}
