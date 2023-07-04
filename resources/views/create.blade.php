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

    <form action="{{ route('estagiario.store') }}" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="form p-2 ">
            <div class="flex">
                <h2 class="font-bold text-lg p-2">Cadastro de estagiário</h2>
            </div>
        <div class="flex gap-7 mx-auto p-2 rounded-lg">

            <div class='grid w-full gap-3'>
                <div class="grid w-full">
                    <label for="nome" class="font-medium">Nome completo</label>
                    <input placeholder="" maxlength="100" minlength="5" name="nome" type="text" title="Escreva no mínimo 5 caracteres" class="bg-gray-50 outline-0 rounded shadow p-2 {{ $errors->has('nome') ?  'input input-bordered input-error' : '' }}" />
                </div>

                <div class="grid w-full">
                    <label class="font-medium">Data de nascimento</label>
                    <input placeholder="Data de nascimento" name="nascimento" max="2005-12-31" type="date" class="bg-gray-50 outline-0 text-sm rounded shadow p-2 {{ $errors->has('nascimento') ?  'input input-bordered input-error' : '' }}" />
                </div>
                <div class="grid w-full">
                    <label class="font-medium">CPF</label>
                    <input placeholder="" type="text" name="cpf" minlength="11" maxlength="11"  class="bg-gray-50 outline-0 rounded shadow p-2 {{ $errors->has('cpf') ?  'input input-bordered input-error' : '' }}" />
                </div class=>
                <div class="grid w-full">
                    <label class="font-medium">Email</label>
                    <input placeholder="" type="email" name="email" class="bg-gray-50 outline-0 rounded shadow p-2 {{ $errors->has('email') ?  'input input-bordered input-error' : '' }}" />
                   </div>
                <div class="grid w-full">
                    <label class="font-medium">Telefone</label>
                    <input placeholder="" type="text" name="telefone" minlength="8" class="bg-gray-50 outline-0 rounded shadow p-2 {{ $errors->has('telefone') ?  'input input-bordered input-error' : '' }}" />
                </div>
                <div class="grid w-full">
                    <label class="font-medium">Nome da faculdade</label>
                    <input placeholder="" type="text" name="faculdade" class="bg-gray-50 outline-0 rounded shadow p-2 {{ $errors->has('faculdade') ?  'input input-bordered input-error' : '' }}" />
                </div>
            </div>
            <div class="grid w-full gap-3">
                <div class="grid w-full">
                    <label class="font-medium">CNPJ faculdade</label>
                    <input placeholder="" type="text" name="cnpj_faculdade" minlength="14" maxlength="14" class="bg-gray-50 outline-0 rounded shadow p-2 {{ $errors->has('cnpj_faculdade') ?  'input input-bordered input-error' : '' }}" />
                </div>
                <div class="grid w-full">
                    <label class="font-medium">Nome do curso</label>
                    <input placeholder="" type="text" name="curso" class="bg-gray-50 outline-0 rounded shadow p-2 {{ $errors->has('curso') ?  'input input-bordered input-error' : '' }}" />
                </div>
                <div class="grid w-full">
                    <label class="font-medium" >Expectativa de formação</label>
                    <input placeholder="Expectativa da formação" type="date" name="expectativa_formacao" class="bg-gray-50 outline-0 rounded shadow p-2 {{ $errors->has('expectativa_formacao') ?  'input input-bordered input-error' : '' }}" />
                </div>
                <div class="grid w-full">
                    <label class="font-medium">Termo de estágio assinado</label>
                    <input type="file" name="termo_assinado" class="file-input file-input-bordered w-full max-w-xs {{ $errors->has('termo_assinado') ?  'input input-bordered input-error' : '' }}" />
                </div>
                <div class="grid w-full">
                    <label class="font-medium">Data inicial do contrato</label>
                    <input placeholder="Data inicial do contrato" type="date" name="inicio_contrato" class="bg-gray-50 outline-0 rounded shadow p-2 text-sm {{ $errors->has('inicio_contrato') ?  'input input-bordered input-error' : '' }}" />
                </div>
                <div class="grid w-full">
                    <label class="font-medium">Data final do contrato</label>
                    <input placeholder="Data final do contrato" type="date" name="fim_contrato" class="date bg-gray-50 outline-0 rounded shadow p-2 text-sm {{ $errors->has('fim_contrato') ?  'input input-bordered input-error' : '' }}" />
                </div>
            </div>
            

        </div>
        <div class="text-center mt-7">
                <button type="submit" class="outline-0 bg-[#002D4B] p-2 rounded shadow text-white font-medium w-[20%] hover:bg-blue-800">Salvar</button>
            </div>

        @if ($message = Session::get('mensage'))
        <div class="alert alert-success shadow-lg">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>O usuário foi criado!</span>
            </div>
        </div>
        @endif

    </form>

</x-layout>
