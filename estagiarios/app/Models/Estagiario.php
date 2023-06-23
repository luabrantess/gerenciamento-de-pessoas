<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Estagiario extends Model
{
    use HasFactory;

    public function get_url_termo_assinado() 
    {
        // return Storage::url(self::termo_assinado());
    }
}
