<x-layout>

    @if ($errors->any())
        <div class="mx-1 max-w-2xl">
            <div class="alert alert-error my-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <p>Erro na criação do estagiário.</p>
            </div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li><span class="text-error-content bg-error my-2 p-1">{{ $error }}</span></li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="m-5">

        <form action="{{ route('fip.store') }}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="form p-2">
                <div class="flex">
                    <h2 class="text-2xl font-medium">Incluir FIP para {{ $estagiario->nome }}</h2>
                </div>

                <div class="w-full">
                    <input type="hidden" name="estagiario" value="{{ $estagiario->id }}">

                    <div class="my-5 w-full">

                        <select title="Selecione o mês da FIP" class="select select-bordered w-full max-w-xs" name="mes" id="mes">
                            <option disabled selected>Selecione o mês</option>

                            @foreach (range(0, 23) as $numeroMes) 
                            @php
                                    $data = Carbon\Carbon::parse($estagiario->inicio_contrato)->locale("pt_BR")->addMonth($numeroMes);
                            @endphp    
                            <option value="01-{{ $data->format('m') }}-{{ $data->format('Y') }}">
                                    
                                    {{ ucfirst($data->monthName) }} / {{ $data->format("Y") }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="my-5">
                        <input type="file" title="Selecione a FIP assinada" name="fip_assinada" class="file-input file-input-bordered w-full max-w-xs" />
                    </div>

                </div>

                <button class="btn btn-outline btn-success mr-auto" type="submit">Salvar FIP</button>

        </form>
    </div>

</x-layout>
