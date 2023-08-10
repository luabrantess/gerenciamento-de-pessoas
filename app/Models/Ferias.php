<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class FeriasEstagiario extends Model
{
    protected $fillable = ['estagiario_id'];

    use HasFactory;



    public function estagiario(): BelongsTo
    {
        return $this->belongsTo(Estagiario::class);
    }
}
