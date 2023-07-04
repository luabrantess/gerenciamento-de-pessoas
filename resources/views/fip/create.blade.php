<x-layout>

    @if ($errors->any())
    <div class="max-w-2xl mx-1">
        <div class="alert alert-error my-5">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline">
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

        <div class="form p-2 ">
            <div class="flex">
                <h2 class="font-medium text-2xl">Incluir FIP para {{ $estagiario->nome }}</h2>
            </div>

            <div class="w-full">
                <input type="hidden" name="estagiario" value="{{ $estagiario->id }}">

                <div class="my-5 w-full">

                    <select title="Selecione o mês da FIP" class="select select-bordered w-full max-w-xs" name="mes" id="mes">
                        <option disabled selected>Selecione o mês</option>
                        @php
                            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                            date_default_timezone_set('America/Sao_Paulo');
                            // Force locale
                            setlocale(LC_ALL, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese-brazil', 'portuguese-brazilian', 'bra', 'brazil', 'br');
                        @endphp

                        @foreach (range(1,12) as $mes)

                        <option value="01-{{ sprintf('%02d', $mes) }}-{{ date('Y') }}">
                            {{  Carbon\Carbon::parse("01-{$mes}-". date('Y'))->formatLocalized('%B %Y') }}
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
