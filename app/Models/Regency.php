<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Regency extends Model
{
    protected $fillable = [
        'id',
        'province_id',
        'name'
    ];

    protected $hidden = [
        'province_id'
    ];

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function ponds(): HasMany
    {
        return $this->hasMany(Pond::class);
    }
}
