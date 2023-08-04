<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class FipEstagiario extends Model
{
    protected $fillable = ['estagiario_id'];

    use HasFactory;

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('mes');
        });
    }

    public function estagiario(): BelongsTo
    {
        return $this->belongsTo(Estagiario::class);
    }
}
