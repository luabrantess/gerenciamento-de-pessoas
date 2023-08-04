<?php

namespace App\Http\Controllers;

use App\Models\Estagiario;
use App\Models\FipEstagiario;
use Illuminate\Http\Request;

class FipEstagiarioController extends Controller
{
    public function create(Estagiario $estagiario)
    {
        return view('fip.create', ['estagiario' => $estagiario]);
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'estagiario' => 'required',
            'mes' => 'required',
            'fip_assinada' => 'required'
        ]);  

        FipEstagiario::updateOrCreate(
            ['estagiario_id' => $validated['estagiario'], 'mes' => $validated['mes']],
            ['fip_assinada' => $request->file('fip_assinada')->storePublicly("fip_assinada/" . $validated['estagiario'], 'public')]
         ); 

        return redirect()->route('estagiario.index')->with('success', "Fip foi salva para " . Estagiario::find($validated['estagiario'])->nome);
    }


    public function delete(FipEstagiario $fip)
    {
        try {
            $fip->delete();
            return redirect()->route('estagiario.index')->with('success', 'FIP apagada com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->route('estagiario.index')->with('error', 'Erro ao tentar deletar a FIP');
        }

    }
}
