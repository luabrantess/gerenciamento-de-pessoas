<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estagiario;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;

class ListaEstagiariosController extends Controller
{
    public function index()
    {
        $estagiarios = DB::table('estagiarios')->get();
        return dd($estagiarios);     

    }
}
