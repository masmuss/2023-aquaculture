<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
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
}
