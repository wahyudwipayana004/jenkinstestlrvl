<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-800 leading-tight">
            {{ __('Dashboard Guru BK - ') }} {{ auth()->user()->school->nama_sekolah ?? 'Sekolah Tidak Terdeteksi' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-green-50 border-b border-green-100 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-green-900 uppercase">Manajemen Kasus Bullying</h3>
                    <div class="flex gap-2">
                        <span class="bg-yellow-500 text-white text-xs px-2 py-1 rounded">Baru: {{ \App\Models\Report::where('school_id', auth()->user()->school_id)->where('status', 'Menunggu')->count() }}</span>
                        <span class="bg-blue-500 text-white text-xs px-2 py-1 rounded">Diproses: {{ \App\Models\Report::where('school_id', auth()->user()->school_id)->where('status', 'Diproses')->count() }}</span>
                    </div>
                </div>

                <div class="p-6">
                    <table class="w-full text-sm text-left border">
                        <thead class="bg-gray-100 text-gray-700 uppercase">
                            <tr>
                                <th class="p-4 border">ID</th>
                                <th class="p-4 border">Pelapor</th>
                                <th class="p-4 border">Kategori</th>
                                <th class="p-4 border">Status</th>
                                <th class="p-4 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $reports = \App\Models\Report::where('school_id', auth()->user()->school_id)->latest()->get(); @endphp
                            @foreach($reports as $report)
                            <tr class="hover:bg-gray-50">
                                <td class="p-4 border">#REP-{{ $report->id }}</td>
                                <td class="p-4 border font-medium">{{ $report->is_anonymous ? '--- ANONIM ---' : $report->user->name }}</td>
                                <td class="p-4 border">{{ $report->jenis_bullying }}</td>
                                <td class="p-4 border text-center">
                                    <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase
                                        {{ $report->status == 'Menunggu' ? 'bg-yellow-100 text-yellow-700' : ($report->status == 'Diproses' ? 'bg-blue-100 text-blue-700' : 'bg-green-100 text-green-700') }}">
                                        {{ $report->status }}
                                    </span>
                                </td>
                                <td class="p-4 border text-center">
                                    <a href="{{ route('guru.report.show', $report->id) }}" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-xs uppercase font-bold">
                                        Periksa
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>