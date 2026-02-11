<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Tiket Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-2xl w-full bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="bg-gray-50 p-8 border-b border-gray-100">
            <div class="flex items-center gap-3 mb-2">
                <div class="bg-blue-100 p-2 rounded-lg text-blue-600">
                    <i data-lucide="plus-circle" class="w-6 h-6"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Buat Tiket Baru</h2>
            </div>
            <p class="text-gray-500">Silakan isi formulir di bawah ini untuk menambahkan tiket ke sistem.</p>
        </div>

        <form action="{{ route('tickets.store') }}" method="POST" class="p-8">
            @csrf 

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                    <div class="flex items-center gap-2 mb-1 font-bold">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        <span>Terjadi Kesalahan:</span>
                    </div>
                    <ul class="list-disc pl-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="space-y-5">
                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Judul Tiket</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" 
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200 @error('title') border-red-500 @enderror" 
                        placeholder="Misal: Login tidak berfungsi">
                </div>

                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi Masalah</label>
                    <textarea name="description" id="description" rows="4" 
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200 @error('description') border-red-500 @enderror" 
                        placeholder="Jelaskan detail kendala yang dialami...">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-1">Prioritas Status</label>
                    <select name="status" id="status" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none cursor-pointer">
                        <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>Open</option>
                        <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
            </div>

            <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                <a href="{{ route('tickets.index') }}" class="text-sm font-semibold text-gray-400 hover:text-gray-600 transition">Batal</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-8 rounded-xl shadow-md transition duration-200 flex items-center gap-2">
                    <i data-lucide="save" class="w-4 h-4"></i>
                    Simpan Tiket
                </button>
            </div>
        </form>
    </div>
    <script>lucide.createIcons();</script>
</body>
</html>