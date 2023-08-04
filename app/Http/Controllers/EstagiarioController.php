<?php

namespace App\Http\Controllers;

use App\Models\Estagiario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Carbon\Carbon;

class EstagiarioController extends Controller
{

    // Exibe uma lista dos estagiários cadastrados
    public function index()
    {
        $estagiarios = Estagiario::where('ativo', true)->get();
        return view('index', ['estagiarios' => $estagiarios]);

    }
    public function inativos()
    {
        $estagiarios = Estagiario::where('ativo', false)->get();
        return view('inativos', ['estagiarios' => $estagiarios]);

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

        $this->save($request, $estagiario);
        return redirect()->route('estagiario.index')
        ->with('success','Estagiário atualizado com sucesso!');

    }

    public function delete(Estagiario $estagiario)
    {
        $estagiario = Estagiario::find($estagiario->id);
        $estagiario->ativo = false;
        $estagiario->save();

        return redirect()->route('estagiario.index')
        ->with('success', 'Estagiário apagado com sucesso!');

    }
    public function undelete(Estagiario $estagiario)
    {
        $estagiario = Estagiario::find($estagiario->id);
        $estagiario->ativo = true;
        $estagiario->save();

        return redirect()->route('estagiario.index')
        ->with('success', 'Estagiário reativado com sucesso!');

    }

    // Faz a gravação do estagiário no Banco de dados
    public function store(Request $request)
    {
        $this->save($request);
        return redirect()->route('estagiario.index')->with('success','Criado com sucesso!');
    }

    public function save($request, $estagiarioAtualizado = null)
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
            'termo_assinado' => [File::types(['pdf'])],
            'inicio_contrato' => 'required',
            'fim_contrato' => 'required',
        ]);

        $estagiario = $estagiarioAtualizado ?? new Estagiario(); // Se for atualização, recebe o estagiario que vai ser atualizado

        $estagiario->nome = $validated['nome'];
        $estagiario->nascimento = $validated['nascimento'];
        $estagiario->cpf = $validated['cpf'];
        $estagiario->email = $validated['email'];
        $estagiario->telefone = $validated['telefone'];
        $estagiario->faculdade = $validated['faculdade'];
        $estagiario->cnpj_faculdade = $validated['cnpj_faculdade'];
        $estagiario->curso = $validated['curso'];
        $estagiario->expectativa_formacao = $validated['expectativa_formacao'];
        $estagiario->inicio_contrato = $validated['inicio_contrato'];
        $estagiario->fim_contrato = $validated['fim_contrato'];
        if ($request->file('termo_assinado')) {
            $estagiario->termo_assinado = $request->file('termo_assinado')->storePublicly('termo_assinado','public');
        }

        $estagiario->save();
    }
}
