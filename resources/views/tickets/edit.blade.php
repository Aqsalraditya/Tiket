<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tiket - {{ $tiket->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Edit Tiket</h2>
            <p class="text-gray-600">Perbarui informasi tiket di bawah ini.</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/tickets/{{ $tiket->id }}" method="POST">
            @csrf
            @method('PUT') 

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Judul Tiket</label>
                <input type="text" name="title" id="title" value="{{ old('title', $tiket->title) }}" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                <textarea name="description" id="description" rows="5" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror">{{ old('description', $tiket->description) }}</textarea>
            </div>

            <div class="mb-6">
                <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
                <select name="status" id="status" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="open" {{ old('status', $tiket->status) == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="in_progress" {{ old('status', $tiket->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="closed" {{ old('status', $tiket->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>
            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('tickets.index') }}" class="text-gray-600 hover:underline text-sm">Kembali ke Daftar</a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                    Update Tiket
                </button>
            </div>
        </form>
    </div>
</body>
</html>