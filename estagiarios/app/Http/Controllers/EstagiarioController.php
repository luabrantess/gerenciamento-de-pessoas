<?php

namespace App\Http\Controllers;

use App\Models\Estagiario;
use Illuminate\Http\Request;
use Session;

class EstagiarioController extends Controller
{
    // Exibe uma lista dos estagiários cadastrados
    public function index()
    {
        $estagiarios = Estagiario::all();

        return view('index', ['estagiarios' => $estagiarios]);

    }

    // Exibe formulário para criar novo estagiário
    public function create()
    {
        return view('create');
    }

    // Exibe o formulário para edição do estagiário
    public function edit(Estagiario $estagiario)
    {

        return view('edit', ['estagiario' => $estagiario]);

    }

    public function update(Request $request, Estagiario $estagiario)
    {

        $validated = $request->validate([
            'nome' => 'required|min:5|max:255',
            'nascimento' => 'required',
            'cpf' => 'required|min:11|max:11',
            'email' => 'required',
            'telefone' => 'required|min:11|max:11',
            'faculdade' => 'required',
            'cnpj_faculdade' => 'required|min:14|max:14',
            'curso' => 'required',
            'expectativa_formacao' => 'required',
            'termo_assinado' => 'required',
            'inicio_contrato' => 'required',
            'fim_contrato' => 'required',
        ]);

        $estagiario->nome = $validated['nome'];
        $estagiario->nascimento =  $validated['nascimento'];
        $estagiario->cpf =  $validated['cpf'];
        $estagiario->email =  $validated['email'];
        $estagiario->telefone =  $validated['telefone'];
        $estagiario->faculdade =  $validated['faculdade'];
        $estagiario->cnpj_faculdade =  $validated['cnpj_faculdade'];
        $estagiario->curso =  $validated['curso'];
        $estagiario->expectativa_formacao =  $validated['expectativa_formacao'];
        $estagiario->inicio_contrato = $validated['inicio_contrato'];
        $estagiario->fim_contrato =  $validated['fim_contrato'];
        $estagiario->termo_assinado = $request->file('termo_assinado')->store('termo_assinado');

        $estagiario->save();
        return redirect()->route('estagiario.index')
        ->with('message','Atualizado com sucesso!');

    }

    public function delete(Estagiario $estagiario)
    {
        $estagiario = Estagiario::find($estagiario->id);
        $estagiario->delete();
        return redirect()->route('estagiario.index')
        ->with('message', 'Apagado com sucesso!');

    }

    // Faz a gravação do estagiário no Banco de dados
    public function store(Request $request)
    {

            $validated = $request->validate([
                'nome' => 'required|min:5|max:255',
                'nascimento' => 'required',
                'cpf' => 'required|min:11|max:11',
                'email' => 'required',
                'telefone' => 'required|min:11|max:11',
                'faculdade' => 'required',
                'cnpj_faculdade' => 'required|min:14|max:14',
                'curso' => 'required',
                'expectativa_formacao' => 'required',
                'termo_assinado' => 'required',
                'inicio_contrato' => 'required',
                'fim_contrato' => 'required',
            ]);

            $estagiario = new Estagiario();

            $estagiario->nome = $validated['nome'];
            $estagiario->nascimento =  $validated['nascimento'];
            $estagiario->cpf =  $validated['cpf'];
            $estagiario->email =  $validated['email'];
            $estagiario->telefone =  $validated['telefone'];
            $estagiario->faculdade =  $validated['faculdade'];
            $estagiario->cnpj_faculdade =  $validated['cnpj_faculdade'];
            $estagiario->curso =  $validated['curso'];
            $estagiario->expectativa_formacao =  $validated['expectativa_formacao'];
            $estagiario->inicio_contrato = $validated['inicio_contrato'];
            $estagiario->fim_contrato =  $validated['fim_contrato'];
            $estagiario->termo_assinado = $request->file('termo_assinado')->store('termo_assinado');

            $estagiario->save();
            return redirect()->route('estagiario.index')->with('success','Criado com sucesso!');
    }
}
