<x-layout>

    <div>

        <div class="form p-2 ">


        <div class="navbar bg-base-100">
            <div class="navbar-start">
                <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                </label>
                </div>
                <a class="btn btn-ghost normal-case text-xl">Lista de Estagiários</a>
            </div>
            <div class="navbar-end">
                <a class="btn" href="{{ route('estagiario.create') }}">Cadastrar novo</a>
            </div>
            </div>

            @if (session()->has('message'))
            <div class="alert alert-success">
                @if(is_array(session('message')))
                    <ul>
                        @foreach (session('message') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @else
                    {{ session('message') }}
                @endif
            </div>
            @endif

            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <!-- head -->
                    <thead>
                        <tr>

                            <th>Nome</th>
                            <th>Faculdade</th>
                            <th>Curso</th>
                            <th>Início contrato</th>
                            <th>Fim contrato</th>
                            <th>Aniversário</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estagiarios as $estagiario)
                            <tr>
                                <th>

                                    <!-- The button to open modal -->
                                    <label for="modal-detalhe-estagiario-{{ $estagiario->id }}" class="btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 inline">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                        </svg>

                                        {{ $estagiario->nome }}
                                    </label>

                                </th>
                                <td>{{ $estagiario->faculdade }}</td>
                                <td>{{ $estagiario->curso }}</td>
                                <td>{{ $estagiario->inicio_contrato }}</td>
                                <td>{{ $estagiario->fim_contrato }}</td>
                                <td>{{ $estagiario->nascimento }}</td>
                                <td>
                                    <a href="{{ route('estagiario.edit', $estagiario->id) }}"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg></a>
                                           <!-- The button to open modal -->
                                    <label for="my-modal" class="btn btn-xs btn-circle btn-outline rounded-full">x</label>

                                    <!-- Put this part before </body> tag -->
                                    
                                    <input type="checkbox" id="my-modal" class="modal-toggle" />

                                        <div class="modal">
                                            <div class="modal-box">
                                                <h3 class="font-bold text-lg">Excluir</h3>
                                                <p class="py-4">Tem certeza que deseja excluir esse usuário?</p>
                                                <div class="modal-action">
                                                
                                                    <form  action="{{ route('estagiario.delete', $estagiario->id) }}" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button class="btn btn-outline btn-success" type="submit">Sim</button>
                                                        @if ($message = Session::get('mensage'))
                                                        <div class="alert alert-success shadow-lg">
                                                            <div>
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                                <span>O usuário foi excluído!</span>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </form>                                                                                       
                                                    <a role="button"  href="{{ route('estagiario.index')}}" class="btn btn-ghost">Não</a>
                                                </div>
                                            </div>
                                        </div>
                     




                                </td>

                            </tr>


                            <!-- Put this part before </body> tag -->
                            <input type="checkbox" id="modal-detalhe-estagiario-{{ $estagiario->id }}"
                                class="modal-toggle" />
                            <div class="modal">
                                <div class="modal-box w-6/12 max-w-5xl">
                                    <h3 class="font-bold text-lg">{{ $estagiario->nome }}</h3>
                                    <p class="py-4">Inicio de contrato: {{ $estagiario->inicio_contrato }}</p>
                                    <p class="py-4">Fim de contrato: {{ $estagiario->fim_contrato }}</p>
                                    <p class="py-4">Faculdade: {{ $estagiario->faculdade }}</p>
                                    <p class="py-4">CNPJ Faculdade: {{ $estagiario->cnpj_faculdade }}</p>
                                    <p class="py-4">Curso: {{ $estagiario->curso }}</p>
                                    <p class="py-4">Expectativa de formação: {{ $estagiario->expectativa_formacao }}
                                    </p>
                                    <p class="py-4">Data de nascimento: {{ $estagiario->nascimento }}</p>
                                    <p class="py-4">Telefone: {{ $estagiario->telefone }}</p>
                                    <p class="py-4">CPF: {{ $estagiario->cpf }}</p>
                                    <p class="py-4">Email: {{ $estagiario->email }}</p>
                                    <p><a href="{{ $estagiario->termo_assinado }}">Termo Assinado</p>
                                    <div class="modal-action">
                                        <label for="modal-detalhe-estagiario-{{ $estagiario->id }}"
                                            class="btn">Fechar</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</x-layout>
