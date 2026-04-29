<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-600 leading-tight">
            {{ __('Riwayat Laporan Saya') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-100">
                
                @if($reports->isEmpty())
                    <div class="text-center py-8">
                        <p class="text-gray-500">Anda belum pernah mengirimkan laporan.</p>
                        <a href="{{ route('siswa.report.create') }}" class="text-blue-600 hover:underline mt-2 inline-block">Buat laporan pertama sekarang</a>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Kejadian</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($reports as $report)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ \Carbon\Carbon::parse($report->tanggal_kejadian)->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-md text-xs">{{ $report->jenis_bullying }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        @if($report->status == 'menunggu')
                                            <span class="text-yellow-600 font-medium italic">Menunggu Verifikasi</span>
                                        @elseif($report->status == 'Diproses')
                                            <span class="text-blue-600 font-medium">
                                                Sedang Diproses
                                            </span>
                                            @else
                                            <span class="text-gray-500 font-medium">
                                                selesai
                                            </span>
                                        @endif
                                                                        
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <a href="{{ route('siswa.report.show', $report->id) }}" class="text-blue-600 hover:text-blue-900 font-semibold bg-blue-50 px-3 py-1 rounded-md transition">
                                               Lihat Detail
                                         </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>