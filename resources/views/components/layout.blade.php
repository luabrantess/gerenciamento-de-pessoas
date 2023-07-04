<!DOCTYPE html>
<html lang="pt-br" data-theme="corporate">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.1.6/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Lista de estagiário</title>
</head>

<body>
    <div class="top w-full bg-[#FCFC30] ">
        <a href="/"><img src="{{ asset('/logo.png') }}" class="w-1/6" /></a>
    </div>

    @if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
    @elseif (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{ $slot }}

</body>

</html>
