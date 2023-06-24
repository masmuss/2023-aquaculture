<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pool extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $fillable = [
        'id',
        'user_id',
        'hardware_id',
        'name',
        'wide',
        'long',
        'depth',
        'noted',
    ];


    public function tools(): HasMany
    {
        return $this->hasMany(Tool::class, 'pool_id', 'id');
    }
}
