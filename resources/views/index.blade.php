<x-layout class="">

    <div>
        <div class="form p-2">
            <div class="navbar bg-base-100 mt-5 mb-3 ">
                <div class="flex-1">
                    <div class="grid">
                    <a class=" normal-case text-xl font-medium text-[#002D4B]">Gerenciamento de cadastro de Estagiários</a>
                    <a class=" normal-case text-2xl font-bold text-[#002D4B]">Lista de Estagiários</a>
                
                    </div>
                </div>
                <div class="flex-none gap-2">
                  <div class="form-control">
                    <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
                  </div>

                  
                    <div class="gap-2 justify-end bg-gray-200 rounded p-3">
                        <a class=" font-medium p-1 text-[#002D4B] bg-white" href="{{ route('estagiario.inativos') }}">Inativos</a>
                        <a class="font-medium p-1  text-[#002D4B] bg-white" href="{{ route('estagiario.create') }}">Cadastrar novo</a>
                    </div>
            
                  
                </div>
              </div>
            

            <div class="overflow-x-auto p-2">
                <table class=" table w-full border-2 rounded ">
                    <!-- head -->
                    <thead class="bg-gray-200 rounded-t-full text-lg text-[#002D4B] font-bold">
                        <tr>
                            <th>Nome</th>
                            <th>Formação</th>
                            <th>Contrato</th>
                            <th>Aniversário</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                            date_default_timezone_set('America/Sao_Paulo');
                        @endphp

                        @foreach ($estagiarios as $estagiario)
                            <tr>
                                <th>
                                    <!-- The button to open modal -->
                                    <label for="modal-detalhe-estagiario-{{ $estagiario->id }}" class="btn bg-white  border-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 mr-2" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/></svg>
                                          
                                        {{ $estagiario->nome }}
                                    </label>

                                </th>
                                <td class="my-auto ">
                                    <h1 class="font-bold text-lg">{{ $estagiario->faculdade }}</h1>
                                    <h3 class="font-medium text-sm">{{ $estagiario->curso }}</h3>
                                </td>
        
                                <td class="">
                                    <h1 class="font-medium text-sm">De {{ date('d/m/Y', strtotime($estagiario->inicio_contrato)) }} a
                                        {{ date('d/m/Y', strtotime($estagiario->fim_contrato)) }} </h1>
                    
                                </td>
                                
                                @php
                                    $aniversario = Carbon\Carbon::create($estagiario->nascimento)->setYear(date('Y'));
                                    $proximo_aniversario = $aniversario->isFuture() ? $aniversario : $aniversario->addYear();
                                    $falta_quanto = $proximo_aniversario->diffForHumans();
                                @endphp

                                <td>
                                    <h1 class="font-medium text-sm">
                                        {{ Carbon\Carbon::create($estagiario->nascimento)->format('d/m') }}
                                    ({{ $falta_quanto }})
                                    </h1>
                                </td>

                                <td >
                                    <details class="dropdown dropdown-left dropdown-end p-6">
                                        <summary class="btn m-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                            </svg>
                                        </summary>

                                        <ul class="menu dropdown-content bg-base-100 rounded-box z-[1] w-52 p-1 shadow">
                                            <li>
                                                <li>
                                                    <label for="modal-fip-usuario-{{ $estagiario->id }}">
                                                        Adicionar FIP
                                                    </label>
                                                </li>
                                            </li>
                                            <li>
                                                <a href="{{ route('estagiario.edit', $estagiario->id) }}">Editar estagiário</a>
                                            </li>
                                            <li>
                                                <label for="modal-ferias-usuario-{{ $estagiario->id }}">
                                                    Planejar férias
                                                </label>
                                            </li>
                                            <li>
                                                <label for="modal-deletar-usuario-{{ $estagiario->id }}">
                                                    Desativar estagiário
                                                </label>
                                            </li>
                                        </ul>
                                    </details>

                                    <!-- Put this part before </body> tag -->

                                    <input type="checkbox" id="modal-deletar-usuario-{{ $estagiario->id }}" class="modal-toggle" />

                                    <div class="modal">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold">Excluir</h3>
                                            <p class="py-4">Tem certeza que deseja desativar o estagiário
                                                {{ $estagiario->nome }}?</p>
                                            <div class="modal-action">

                                                <form action="{{ route('estagiario.delete', $estagiario->id) }}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button class="outline-0 bg-[#002D4B] p-4 w-auto rounded shadow text-white font-medium w-full hover:bg-blue-800" type="submit">Sim</button>

                                                </form>
                                                <label for="modal-deletar-usuario-{{ $estagiario->id }}" class="btn">Fechar</label>
                                            </div>

                                        </div>
                                    </div>

                                    <input type="checkbox" id="modal-fip-usuario-{{ $estagiario->id }}" class="modal-toggle" />

                                    <div class="modal rounded-xl">
                                        <div class="modal-box mx-auto my-auto w-full">
                                            <h3 class="text-lg font-bold">Adicionar FIP para {{$estagiario->nome}}</h3>
                                            <form action="{{ route('fip.store') }}" enctype="multipart/form-data" method="POST">
                                            <div class="w-full text-center">
                                                <input type="hidden" name="estagiario" value="{{ $estagiario->id }}">

                                                
                                                    
                                                    @csrf
                                                    <div class=" my-5 text-center w-full">
                            
                                                        <select title="Selecione o mês da FIP" class="select  border-0 bg-gray-100 w-full max-w-xs" name="mes" id="mes">
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
                                
                                                    <div class="my-5 text-center w-full">
                                                        <input type="file" title="Selecione a FIP assinada" name="fip_assinada" class="file-input file-input-bordered w-full max-w-xs" />
                                                    </div>
                                                                                                        
                                                    <div class="flex justify-center items-center text-center">
                                                        <button type="submit" class="outline-0 bg-[#002D4B] p-4 w-[70%] rounded shadow text-white font-medium w-[20%] hover:bg-blue-800">Salvar</button>
                                                                                        
                                                
                                                    </div>
                                                    <label for="modal-fip-usuario-{{ $estagiario->id }}" class="font-medium mt-2 text-center text-lg">Fechar</label>


                                                </form>
                                             
                                        
                            
                                               
                                            </div>
                             

                                        </div>
                                    </div>

                                    <input type="checkbox" id="modal-ferias-usuario-{{ $estagiario->id }}" class="modal-toggle" />

                                    <div class="modal rounded-xl">
                                        <div class="modal-box mx-auto my-auto w-full">
                                            <h3 class="text-lg font-bold">Incluir férias para {{$estagiario->nome}}</h3>
                                            <form action="{{ route('ferias.store', $estagiario->id) }}" enctype="multipart/form-data" method="POST">
                                            <div class="w-full text-center mt-5">
                                                <input type="hidden" name="estagiario" value="{{ $estagiario->id }}">                                         
                                                    @csrf
                                                    <label class="font-medium ">Inicio das férias</label>
                                                    <div class="my-2 text-center w-full">
                                                        
                                                        <input placeholder="" name="inicio" min="{{ Carbon\Carbon::parse($estagiario->inicio_contrato)->addMonths(4)->format('Y-m-d') }}" max="{{ Carbon\Carbon::parse($estagiario->fim_contrato)->subMonths(1)->format('Y-m-d') }}" type="date" required
                                                        class="border-0 bg-gray-100 w-full max-w-xs p-4 rounded" title="Escolha a data " value="" />
                                                    </div>
                                            
                                                    <label class="font-medium">Fim das férias</label>
                                                    <div class="my-2 text-center w-full">
                                                        
                                                        <input placeholder="" name="fim" max="2005-12-31" type="date" required
                                                        class="border-0 bg-gray-100 w-full max-w-xs p-4 rounded" value="{{ Date('Y-m-d', strtotime($estagiario->fim)) }}" />
                                                    </div>
                                                                
                                                    <div class="flex justify-center items-center mt-5 text-center">
                                                        <button type="submit" class="outline-0 bg-[#002D4B] p-4 w-[70%] rounded shadow text-white font-medium w-[20%] hover:bg-blue-800">Salvar</button>
                                                                                        
                                                        
                                                    </div>

                                                    <label for="modal-ferias-usuario-{{ $estagiario->id }}" class="font-medium mt-2 text-center text-lg">Fechar</label>
                                                    


                                                </form>
                                             
                                        
                            
                                               
                                            </div>
                             

                                        </div>
                                    </div>
                                    </li>
                                    <!-- The button to open modal -->
                                </td>
                            </tr>

                            <x-modalEstagiario :estagiario="$estagiario" />
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-layout>
