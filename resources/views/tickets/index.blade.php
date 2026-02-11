<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tiket</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-50 min-h-screen p-6 md:p-12">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Daftar Tiket</h1>
                <p class="text-gray-500 mt-1">Kelola semua tiket support pelanggan Anda di sini.</p>
            </div>
            <a href="{{ route('tickets.create') }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-5 rounded-lg transition duration-200 shadow-sm">
                <i data-lucide="plus" class="w-5 h-5 mr-2"></i>
                Buat Tiket Baru
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 mb-6 rounded shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="p-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Judul</th>
                        <th class="p-4 text-xs font-bold text-gray-400 uppercase tracking-wider text-center">Status</th>
                        <th class="p-4 text-xs font-bold text-gray-400 uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($tickets as $ticket)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="p-4">
                            <div class="font-semibold text-gray-800 text-base">{{ $ticket->title }}</div>
                            <div class="text-xs text-gray-400 mt-1">
                                #TK-10{{ $ticket->id }} • Dilaporkan {{ $ticket->created_at->diffForHumans() }}
                            </div>
                        </td>
                        <td class="p-4 text-center">
                            @php
                                $statusClasses = [
                                    'open' => 'bg-emerald-100 text-emerald-700',
                                    'in_progress' => 'bg-orange-100 text-orange-700',
                                    'closed' => 'bg-gray-100 text-gray-600'
                                ];
                                $currentClass = $statusClasses[strtolower($ticket->status)] ?? 'bg-gray-100 text-gray-600';
                            @endphp
                            <span class="inline-block px-3 py-1 text-xs font-bold rounded-full {{ $currentClass }}">
                                {{ ucfirst($ticket->status) }}
                            </span>
                        </td>
                        <td class="p-4">
                            <div class="flex justify-end items-center gap-3">
                                <a href="{{ route('tickets.edit', ['ticket' => $ticket->id]) }}" class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition duration-200" title="Edit Tiket">
                                    <i data-lucide="pencil" class="w-5 h-5"></i>
                                </a>
                                
                                <form action="{{ route('tickets.destroy', ['ticket' => $ticket->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tiket ini?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition duration-200" title="Hapus Tiket">
                                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @if($tickets->isEmpty())
                    <tr>
                        <td colspan="3" class="p-12 text-center text-gray-400">Belum ada tiket yang terdaftar.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>