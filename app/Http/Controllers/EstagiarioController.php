<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estagiario;

class EstagiarioController extends Controller
{

    public function store(Request $request){


        $estagiario = new Estagiario();
        $estagiario->nome = $request->input('nome');
        $estagiario->nascimento = $request->input('nascimento');
        $estagiario->cpf = $request->input('cpf');
        $estagiario->email = $request->input('email');
        $estagiario->telefone = $request->input('telefone');
        $estagiario->faculdade = $request->input('faculdade');
        $estagiario->cnpj_faculdade = $request->input('cnpj_faculdade');
        $estagiario->curso = $request->input('curso');
        $estagiario->expectativa_formacao = $request->input('expectativa_formacao');
        $estagiario->termo_assinado = $request->input('termo_assinado');
        $estagiario->inicio_contrato = $request->input('inicio_contrato');
        $estagiario->fim_contrato = $request->input('fim_contrato');

        $estagiario->save();

        return redirect('/');

       
    }
}


