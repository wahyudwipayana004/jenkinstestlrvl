<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Daftar Kasus: <span class="text-red-600">{{ $school->nama_sekolah }}</span>
            </h2>
            <a href="{{ route('dinas.monitoring') }}" class="text-sm font-bold text-gray-500 hover:text-gray-700">&larr; Kembali ke Dashboard</a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-4 p-4 bg-blue-50 border-l-4 border-blue-500 text-blue-700">
                    Menampilkan total <strong>{{ $reports->count() }}</strong> laporan perundungan yang terdaftar di sekolah ini.
                </div>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-800 text-white uppercase text-xs">
                            <th class="p-3">Tgl Lapor</th>
                            <th class="p-3">Pelapor</th>
                            <th class="p-3">Kategori</th>
                            <th class="p-3">Status</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reports as $report)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3 text-sm">{{ $report->created_at->format('d/m/Y') }}</td>
                            <td class="p-3 text-sm font-bold text-gray-700">
                                {{ $report->is_anonymous ? 'ANONIM' : $report->user->name }}
                            </td>
                            <td class="p-3">
                                <span class="text-xs px-2 py-1 bg-gray-200 rounded-md font-semibold text-gray-600">
                                    {{ $report->jenis_bullying }}
                                </span>
                            </td>
                            <td class="p-3">
                                @if($report->status == 'Menunggu')
                                    <span class="text-yellow-600 text-xs font-bold uppercase">● {{ $report->status }}</span>
                                @elseif($report->status == 'Diproses')
                                    <span class="text-blue-600 text-xs font-bold uppercase">● {{ $report->status }}</span>
                                @else
                                    <span class="text-green-600 text-xs font-bold uppercase">● {{ $report->status }}</span>
                                @endif
                            </td>
                            <td class="p-3 text-center">
                                <a href="{{ route('dinas.report.show', $report->id) }}" class="bg-red-700 text-white px-4 py-2 rounded text-xs font-bold uppercase hover:bg-red-800 transition shadow-sm">
                                    Buka Detail Kasus
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500 italic">Belum ada laporan masuk untuk sekolah ini.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>