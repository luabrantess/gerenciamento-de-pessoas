<?php

namespace App\Http\Controllers;

use App\Models\Estagiario;
use Illuminate\Http\Request;
use App\Models\FeriasEstagiario;

class FeriasEstagiarioController extends Controller
{
    public function ferias(Estagiario $estagiario)
    {
        return view('ferias', ['estagiario' => $estagiario]);
    }

    public function store(Request $request, Estagiario $estagiario){

        $validated = $request->validate([
            'estagiario' => 'required',
            'inicio' => 'required',
            'fim' => 'required'
        ]);  

        FeriasEstagiario::updateOrCreate(
            ['estagiario_id' => $validated['estagiario'], 'inicio' => $validated['inicio']],
            ['fim' => $validated['fim']]
         ); 

        return redirect()->route('estagiario.index')->with('success', "Suas férias serão avaliadas, aguarde! ");
    }

}