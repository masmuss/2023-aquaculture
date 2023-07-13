<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pond extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'user_id',
        'hardware_id',
        'address',
    ];

    public function pools(): HasMany
    {
        return $this->hasMany(Pool::class, 'hardware_id', 'hardware_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
