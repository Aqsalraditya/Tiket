<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pencarian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white min-h-screen p-10">

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Hasil Pencarian</h1>

        <form action="/vulnerable/search" method="GET" class="mb-10">
            <div class="flex items-center border-b-2 border-blue-500 py-2">
                <input type="text" name="q" placeholder="Cari di sini..." 
                       class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                       value="{{ request('q') }}">
                <button type="submit" class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 text-sm border-4 text-white py-1 px-4 rounded transition">
                    Cari!
                </button>
            </div>
        </form>

        @if(request('q'))
        <div class="mt-8">
            <p class="text-lg text-gray-600">
                Anda mencari: <span class="font-semibold text-blue-600">"{{ $query }}"</span>
            </p>
        </div>
        @endif
    </div>

</body>
</html>