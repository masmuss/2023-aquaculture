<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'hardware_id',
        'name',
        'wide',
        'long',
        'depth',
        'noted',
    ];
}
