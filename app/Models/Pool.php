<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pool extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $fillable = [
        'id',
        'pond_id',
        'hardware_id',
        'name',
        'wide',
        'long',
        'depth',
        'noted',
    ];

    public function hardware(): BelongsTo
    {
        return $this->belongsTo(Hardware::class);
    }

    public function samplings(): HasMany
    {
        return $this->hasMany(Sampling::class);
    }

    public function monitorings(): HasMany
    {
        return $this->hasMany(Monitoring::class);
    }
}
