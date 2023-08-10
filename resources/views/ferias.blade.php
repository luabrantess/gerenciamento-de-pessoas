<x-layout>
<form action="{{ route('ferias.store', $estagiario->id) }}" method="POST">
    @csrf
    <div class="datas grid p-5 gap-3 ">

        <div class="flex">
            <h2 class="text-2xl font-medium">Incluir Férias para {{ $estagiario->nome }}</h2>
        </div>

        <div class="grid w-full">
            <label class="font-medium">Inicio das férias</label>
            <input placeholder="" name="inicio" min="{{ Carbon\Carbon::parse($estagiario->inicio_contrato)->addMonths(4)->format('Y-m-d') }}" max="{{ Carbon\Carbon::parse($estagiario->fim_contrato)->subMonths(1)->format('Y-m-d') }}" type="date" required
            class="bg-gray-50 outline-0 rounded shadow p-2" value="" />
        </div>

        <div class="grid w-full">
            <label class="font-medium">Fim das férias</label>
            <input placeholder="" name="fim" max="2005-12-31" type="date" required
            class="bg-gray-50 outline-0 rounded shadow p-2" value="{{ Date('Y-m-d', strtotime($estagiario->fim)) }}" />
        </div>

    </div>

    <div class="text-center mt-10">
        <button type="submit"
            class="outline-0 bg-[#002D4B] p-2 rounded shadow text-white font-medium w-[20%] hover:bg-blue-800">Salvar</button>
    </div>
</form>

</x-layout>