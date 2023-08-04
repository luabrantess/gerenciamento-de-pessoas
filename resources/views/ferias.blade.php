<x-layout>
<form action="{{ route('ferias.store') }}" enctype="multipart/form-data" method="POST">
    <div class="datas grid p-5 gap-3 ">

        <div class="flex">
            <h2 class="text-2xl font-medium">Incluir FIP para {{ $estagiario->nome }}</h2>
        </div>

        <div class="grid w-full">
            <label class="font-medium">Inicio das férias</label>
            <input placeholder="" name="nascimento" max="2005-12-31" type="date" required
            class="bg-gray-50 outline-0 rounded shadow p-2" value="{{ Date('Y-m-d', strtotime($estagiario->nascimento)) }}" />
        </div>

        <div class="grid w-full">
            <label class="font-medium">Fim das férias</label>
            <input placeholder="" name="nascimento" max="2005-12-31" type="date" required
            class="bg-gray-50 outline-0 rounded shadow p-2" value="{{ Date('Y-m-d', strtotime($estagiario->nascimento)) }}" />
        </div>

    </div>

    <div class="text-center mt-10">
        <button type="submit"
            class="outline-0 bg-[#002D4B] p-2 rounded shadow text-white font-medium w-[20%] hover:bg-blue-800">Salvar</button>
    </div>
</form>

</x-layout>