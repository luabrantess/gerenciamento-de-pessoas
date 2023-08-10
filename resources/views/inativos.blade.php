<x-layout>

    <div>
        <div class="form p-2">
            <div class="navbar bg-base-100">
                <div class="navbar-start">
                    <div class="dropdown">
                        <label tabindex="0" class="btn btn-ghost lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </label>
                    </div>
                    <a class="btn btn-ghost text-xl normal-case">Lista de Estagiários inativos</a>
                </div>
                
            </div>

            <div class="overflow-x-auto">
                <table class="table-zebra table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Faculdade</th>
                            <th>Curso</th>
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
                                    <label for="modal-detalhe-estagiario-{{ $estagiario->id }}" class="btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 inline h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                        </svg>
                                        {{ $estagiario->nome }}
                                    </label>

                                </th>
                                <td>{{ $estagiario->faculdade }}</td>
                                <td>{{ $estagiario->curso }}</td>
                                <td>De {{ date('d/m/Y', strtotime($estagiario->inicio_contrato)) }} a
                                    {{ date('d/m/Y', strtotime($estagiario->fim_contrato)) }} </td>

                                @php
                                    $aniversario = Carbon\Carbon::create($estagiario->nascimento)->setYear(date('Y'));
                                    $proximo_aniversario = $aniversario->isFuture() ? $aniversario : $aniversario->addYear();
                                    $falta_quanto = $proximo_aniversario->diffForHumans();
                                @endphp

                                <td>{{ Carbon\Carbon::create($estagiario->nascimento)->format('d/m') }}
                                    ({{ $falta_quanto }})
                                </td>

                                <td>
                                    <details class="dropdown dropdown-left dropdown-end p-3">
                                        <summary class="btn m-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                            </svg>
                                        </summary>

                                        <ul class="menu dropdown-content bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                                            
                                            <li>
                                                <a href="{{ route('estagiario.edit', $estagiario->id) }}">Editar estagiário</a>
                                            </li>
                                            <li>
                                                <label for="modal-deletar-usuario-{{ $estagiario->id }}">
                                                    Reativar estagiário
                                                </label>
                                            </li>
                                        </ul>
                                    </details>

                                    <!-- Put this part before </body> tag -->

                                    <input type="checkbox" id="modal-deletar-usuario-{{ $estagiario->id }}" class="modal-toggle" />

                                    <div class="modal">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold">Reativar</h3>
                                            <p class="py-4">Tem certeza que deseja reativar o estagiário
                                                {{ $estagiario->nome }}?</p>
                                            <div class="modal-action">

                                                <form action="{{ route('estagiario.undelete', $estagiario->id) }}" method="POST">
                                                    
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button class="btn btn-outline btn-success" type="submit">Sim</button>

                                                </form>
                                                <label for="modal-deletar-usuario-{{ $estagiario->id }}" class="btn">Fechar</label>
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
