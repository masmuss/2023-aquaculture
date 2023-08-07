<?php

namespace App\Models;

use App\Traits\ProvinceTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    use ProvinceTrait;

    protected $fillable = [
        'id',
        'name'
    ];

    public function regencies(): HasMany
    {
        return $this->hasMany(Regency::class);
    }
}
