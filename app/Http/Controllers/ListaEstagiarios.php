<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estagiario;
use Illuminate\Support\Facades\DB;

class ListaEstagiario{

    public function store(){

        $estagiario = DB::table('estagiarios');
        return($estagiario);
    }

}