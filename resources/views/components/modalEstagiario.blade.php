<!-- Modal do estagiário -->
<input type="checkbox" id="modal-detalhe-estagiario-{{ $estagiario->id }}" class="modal-toggle" />
<div class="modal">
    <div class="modal-box max-w-5xl">
        <h3 class="text-lg font-bold">{{ $estagiario->nome }} </h3>
        <p class="py-4"><a class="btn btn-sm" target="_blank" href="{{ asset('storage/' . $estagiario->termo_assinado) }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline h-5 w-5">
                    <path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z" clip-rule="evenodd" />
                    <path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                </svg>
                Termo Assinado
            </a></p>


        <div class="rounded border-2 p-2">

        <h1 class="text-xl font-medium">Fips assinadas</h1>

        <div class="mt-2 flex flex-cols-2 gap-2 text-center space-y-2 ">

            @foreach ($estagiario->fips as $fip)
                <div class="flex ml-0">
                    <a class="btn grow" target="_blank" href="{{ asset('storage/' . $fip->fip_assinada) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                        </svg>
                        FIP {{ substr(strftime('%B%Y', strtotime($fip->mes)), 0, 3) }},
                        {{ strftime('%Y') }}
                    </a>

                    <a class="">
                        <!-- Open the modal using ID.showModal() method -->
                        <label class="btn" for="confirma_delete_fip_modal_{{ $fip->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-3 w-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </label>

                    </a>
                </div>

                <!-- Put this part before </body> tag -->
                <input type="checkbox" id="confirma_delete_fip_modal_{{ $fip->id }}" class="modal-toggle" />
                <div id="confirma_delete_fip_modal_{{ $fip->id }}" class="modal">
                    <div class="modal-box">
                        <h3 class="text-lg font-bold">Confirma deletar FIP</h3>
                        <p class="py-4">Tem certeza que deseja deletar a FIP?</p>
                        <div class="modal-action">
                            <form id="confirma_delete_fip_form_{{ $fip->id }}" action="{{ route('fip.delete', $fip->id) }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button form="confirma_delete_fip_form_{{ $fip->id }}" type="submit" class="btn btn-success">Confirmar</button>
                            </form>
                            <label for="confirma_delete_fip_modal_{{ $fip->id }}" class="btn">Cancelar</label>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>

        </div>

        <div class="mt-2 rounded border-2 p-2">
            <h1 class="text-xl font-medium">Férias</h1>
            
        </div>

        <div class="mt-2 rounded border-2 p-2">
            <h1 class="text-xl font-medium">Dados pessoais</h1>
            <p>Data de nascimento:
                {{ date('d/m/Y', strtotime($estagiario->nascimento)) }}</p>
            <p class="">Telefone: {{ $estagiario->telefone }}</p>
            <p class="">CPF: {{ $estagiario->cpf }}</p>
            <p class="">Email: {{ $estagiario->email }}</p>
        </div>

        <div class="mt-2 rounded border-2 p-2">
            <h1 class="text-xl font-medium">Dados universitários</h1>
            <p class="">Inicio de contrato:
                {{ date('d/m/Y', strtotime($estagiario->inicio_contrato)) }}</p>
            <p class="">Fim de contrato:
                {{ date('d/m/Y', strtotime($estagiario->fim_contrato)) }}</p>
            <p class="">Faculdade: {{ $estagiario->faculdade }}</p>
            <p class="">CNPJ Faculdade: {{ $estagiario->cnpj_faculdade }}</p>
            <p class="">Curso: {{ $estagiario->curso }}</p>
            <p class="">Expectativa de formação:
                {{ date('d/m/Y', strtotime($estagiario->expectativa_formacao)) }}</p>
        </div>

        <div class="modal-action">
            <label for="modal-detalhe-estagiario-{{ $estagiario->id }}" class="btn">Fechar</label>
        </div>
    </div>
</div>
<!-- /Modal do estagiário -->
