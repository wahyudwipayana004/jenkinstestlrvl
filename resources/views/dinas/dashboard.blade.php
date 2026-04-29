<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-700 leading-tight">
            {{ __('Pusat Kendali Monitoring Bullying - Dinas Pendidikan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-blue-500">
                    <div class="p-6 flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-gray-700">Manajemen Sekolah</h3>
                            <p class="text-sm text-gray-500">Tambah, edit, atau hapus data sekolah terdaftar.</p>
                        </div>
                        <a href="{{ route('dinas.schools.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold uppercase rounded transition">
                            Buka Kelola Sekolah
                        </a>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-orange-500">
                    <div class="p-6 flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-gray-700">Database Laporan</h3>
                            <p class="text-sm text-gray-500">Total akumulasi kasus dari seluruh instansi.</p>
                        </div>
                        <span class="px-4 py-2 bg-orange-100 text-orange-800 text-xs font-bold uppercase rounded border border-orange-200">
                            Total: {{ \App\Models\Report::count() }} Kasus
                        </span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-white p-6 rounded-lg shadow border-b-4 border-red-500">
                    <p class="text-xs font-bold text-gray-500 uppercase">Total Laporan</p>
                    <p class="text-3xl font-black text-gray-800">{{ \App\Models\Report::count() }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-b-4 border-blue-500">
                    <p class="text-xs font-bold text-gray-500 uppercase">Sekolah Terdaftar</p>
                    <p class="text-3xl font-black text-gray-800">{{ \App\Models\School::count() }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-b-4 border-yellow-500">
                    <p class="text-xs font-bold text-gray-500 uppercase">Sedang Diproses</p>
                    <p class="text-3xl font-black text-gray-800">{{ \App\Models\Report::where('status', 'Diproses')->count() }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-b-4 border-green-500">
                    <p class="text-xs font-bold text-gray-500 uppercase">Kasus Selesai</p>
                    <p class="text-3xl font-black text-gray-800">{{ \App\Models\Report::where('status', 'Selesai')->count() }}</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-50 border-b border-gray-200">
                    <h3 class="font-bold text-gray-700 uppercase text-sm tracking-wider">Peringkat Laporan Berdasarkan Sekolah</h3>
                </div>
                <div class="p-6 overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100 uppercase text-xs font-bold text-gray-600">
                                <th class="p-3 border">Nama Sekolah</th>
                                <th class="p-3 border text-center">Total Laporan</th>
                                <th class="p-3 border text-center">Tingkat Kerawanan</th>
                                <th class="p-3 border text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Models\School::withCount('reports')->orderBy('reports_count', 'desc')->get() as $school)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-3 border font-semibold text-gray-700">{{ $school->nama_sekolah }}</td>
                                <td class="p-3 border text-center font-bold">{{ $school->reports_count }}</td>
                                <td class="p-3 border text-center">
                                    @if($school->reports_count > 10)
                                        <span class="px-2 py-1 rounded bg-red-100 text-red-700 text-xs font-bold uppercase italic">Tinggi</span>
                                    @elseif($school->reports_count > 5)
                                        <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-700 text-xs font-bold uppercase">Sedang</span>
                                    @else
                                        <span class="px-2 py-1 rounded bg-green-100 text-green-700 text-xs font-bold uppercase">Rendah</span>
                                    @endif
                                </td>
                                <td class="p-3 border text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('dinas.monitoring.school', $school->id) }}" 
                                           class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded text-xs font-bold transition">
                                            Lihat Laporan
                                        </a>
                
                                        <a href="{{ route('dinas.sekolah.export', $school->id) }}" 
                                           class="bg-orange-800 hover:bg-orange-900 text-white px-3 py-1 rounded text-xs font-bold transition">
                                            Unduh Rekap
                                        </a>
                                    </div>
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