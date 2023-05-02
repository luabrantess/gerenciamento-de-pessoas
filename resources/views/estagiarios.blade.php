<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
    <title>Lista de estagiário</title>
</head>
<body>

    
    <div>
        <div class="top w-full bg-[#FCFC30] ">
            <img src="logo.png" class="w-1/6"/> 
        </div>
        <div class="form p-2 ">
            <div class="flex">
                <h2 class="font-bold p-4">Lista de estagiários</h2>
                <button class="bg-[#002D4B] text-white font-bold rounded p-2 mx-2 my-3 ml-auto" onclick="location.href='{{ url('/create') }}'">Cadastrar novo</button>
            </div>
            <form class="lista p-4 border-2">
                <div class="labels grid text-center grid-cols-3">
                    <label>Nome completo</label>
                    <label>Email</label>
                    <label>Nome da faculdade</label>

                </div>
                <div class="inputs grid text-center grid-cols-3 gap-y-3 gap-x-2">
                    <input class="bg-gray-50 outline-0 p-2 "/>
                    <input class="bg-gray-50 outline-0 p-2 "/>
                    <input class="bg-gray-50 outline-0 p-2 "/>
                    <input class="bg-gray-50 outline-0 p-2 "/>
                    <input class="bg-gray-50 outline-0 p-2 "/>
                    <input class="bg-gray-50 outline-0 p-2 "/>
                </div>
</form>

        </div>

    </div>
    
</body>
</html>