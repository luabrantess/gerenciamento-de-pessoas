<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>

        <title>Gestão de estágios</title>
        
    </head>
    <body>
    <form action="{{ route('estagiario.store') }}" method="POST" class="form w-full h-full">
            @csrf
            <div class="top bg-[#FCFC30] ">
                <img src="logo.png" class="w-1/6"/>
               
            </div>
            <h2 class="font-bold text-center p-4">Cadastro de estagiário</h2>
            <div class="grid w-[80%] mx-auto p-4 border-2 gap-y-2 gap-x-2">

                <label for="nome">Nome completo</label>
                <input placeholder="Nome completo" maxlength="100" minlength="5" name="nome" type="text" required title="Escreva no mínimo 5 caractéres" class="bg-gray-50 outline-0 rounded shadow p-2"/>
                <label>Data de nascimento</label>
                <input placeholder="Data de nascimento" name="nascimento" max="2005-12-31" type="date" required class="bg-gray-50 outline-0 rounded shadow p-2"/>
                <label>CPF</label>
                <input placeholder="CPF" type="number" name="cpf" required minlength="11" maxlength="11" class="bg-gray-50 outline-0 rounded shadow p-2"/>
                <label>Email</label>
                <input placeholder="Email" type="email" name="email" required class="bg-gray-50 outline-0 rounded shadow p-2"/>
                <label>Telefone</label>
                <input placeholder="Telefone" type="number" name="telefone" minlength="8" required class="bg-gray-50 outline-0 rounded shadow p-2"/>
                <label>Nome da faculdade</label>
                <input placeholder="Nome da faculdade" type="text" name="faculdade" required class="bg-gray-50 outline-0 rounded shadow p-2"/>
                <label>CNPJ faculdade</label>
                <input placeholder="CNPJ da faculdade" type="number" name="cnpj_faculdade" minlength="14" maxlength="14" required class="bg-gray-50 outline-0 rounded shadow p-2"/>
                <label>Nome do curso</label>
                <input placeholder="Nome do curso" type="text" name="curso" required class="bg-gray-50 outline-0 rounded shadow p-2"/>
                <label>Expectativa de formação</label>
                <input placeholder="Expectativa da formação" type="date" name="expectativa_formacao" required class="bg-gray-50 outline-0 rounded shadow p-2"/>
                <label>Termo de estágio assinado</label>
                <input placeholder="Termo de estágio assinado" type="file" name="termo_assinado" required class="bg-gray-50 outline-0 rounded shadow p-2"/>
                <label>Data inicial do contrato</label>
                <input placeholder="Data inicial do contrato" type="date" name="inicio_contrato" required class="bg-gray-50 outline-0 rounded shadow p-2"/>
                <label>Data final do contrato</label>
                <input placeholder="Data final do contrato" type="date" name="fim_contrato" required class="bg-gray-50 outline-0 rounded shadow p-2"/>
                <div class="text-center mt-10">
                <button type="submit" class="outline-0 bg-[#002D4B] p-2 rounded shadow text-white font-medium w-[20%] hover:bg-blue-800" >Enviar</button>
                </div>
            </div>
                                
    </form>
    </body>
</html>
