<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estagiario extends Model
{
    use HasFactory;

    public function get_url_termo_assinado()
    {
        // return Storage::url(self::termo_assinado());
    }

    public function fips(): HasMany
    {
        return $this->hasMany(FipEstagiario::class);
    }
}
