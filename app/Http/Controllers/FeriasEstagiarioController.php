<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\Estagiario;
use Illuminate\Http\Request;
use App\Models\FeriasEstagiario;

class FeriasEstagiarioController extends Controller
{
    public function ferias(Estagiario $estagiario)
    {
        return view('ferias', ['estagiario' => $estagiario]);
    }

    public function store(Request $request){

        $validated = $request->validate([
            'estagiario' => 'required',
            'data_inicio' => 'required',
            'data_fim' => 'required'
        ]);  

        FeriasEstagiario::updateOrCreate(
            ['estagiario_id' => $validated['estagiario'], 'data_inicio' => $validated['data_inicio']],
            ['data_fim' => $validated['data_fim']]
         ); 

        return redirect()->route('estagiario.index')->with('success', "Suas férias serão avaliadas, aguarde! ");
    }

}