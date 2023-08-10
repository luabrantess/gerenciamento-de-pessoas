<x-layout>
    <div>
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


    <form action="{{ route('estagiario.update', $estagiario->id) }}" method="POST" enctype="multipart/form-data"">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form p-4 ">
            <div class="flex-1">
                <div class="grid mt-5 mb-3">
                <a class=" normal-case text-xl font-medium text-[#002D4B]">Gerenciamento de cadastro de Estagiários</a>
                <a class=" normal-case text-2xl font-bold text-[#002D4B]">Edição de Estagiários</a>
            
                </div>
            </div>

            <div class="flex gap-2 p-10 mx-auto rounded-lg">

                <div class='grid w-full bg-[#002D4B] p-10  rounded-xl gap-3'>
                    <div class=" flex my-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 text-white h-20">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                          </svg>
                          <input type="file" class="file-input my-auto ml-4 file-input-bordered" />
                          
                    
                    </div>
    
                    <div class="grid w-full">
                        <label for="nome" class="font-medium text-white">Nome completo</label>
                        <input placeholder="" maxlength="100" minlength="5" name="nome" type="text" title="Escreva no mínimo 5 caracteres" class="bg-gray-50 outline-0 rounded shadow p-2 {{ $errors->has('nome') ?  'input input-bordered input-error' : '' }}" />
                    </div>
    
                    <div class="grid w-full">
                        <label class="font-medium text-white">Data de nascimento</label>
                        <input placeholder="Data de nascimento" name="nascimento" max="2005-12-31" type="date" class="bg-gray-50 outline-0 text-sm rounded shadow p-2 {{ $errors->has('nascimento') ?  'input input-bordered input-error' : '' }}" />
                    </div>
                    <div class="grid w-full">
                        <label class="font-medium text-white">CPF</label>
                        <input placeholder="" type="text" name="cpf" minlength="11" maxlength="11"  class="bg-gray-50 outline-0 rounded shadow p-2 {{ $errors->has('cpf') ?  'input input-bordered input-error' : '' }}" />
                    </div class=>
                    <div class="grid w-full">
                        <label class="font-medium text-white">Email</label>
                        <input placeholder="" type="email" name="email" class="bg-gray-50 outline-0 rounded shadow p-2 {{ $errors->has('email') ?  'input input-bordered input-error' : '' }}" />
                       </div>
                    <div class="grid w-full">
                        <label class="font-medium text-white">Telefone</label>
                        <input placeholder="" type="text" name="telefone" minlength="8" class="bg-gray-50 outline-0 rounded shadow p-2 {{ $errors->has('telefone') ?  'input input-bordered input-error' : '' }}" />
                    </div>
                    <div class="grid w-full">
                        <label class="font-medium text-white">Nome da universidade</label>
                        <input placeholder="" type="text" name="faculdade" class="bg-gray-50 outline-0 rounded shadow p-2 {{ $errors->has('faculdade') ?  'input input-bordered input-error' : '' }}" />
                    </div>
                </div>
                <div class="grid w-full border-2 p-10 text-[#002D4B] rounded-xl gap-3">
                    <div class="grid w-full">
                        <label class="font-medium">CNPJ universidade</label>
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
    
                    <div class="text-center w-full mt-7">
                        <button type="submit" class="outline-0 bg-[#002D4B] p-2 w-full p-4 rounded shadow text-white font-medium w-[20%] hover:bg-blue-800">Salvar</button>
                    </div>
                </div>
                
    
            </div>
        



    </form>
</div>



</x-layout>
