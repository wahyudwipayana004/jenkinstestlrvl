<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-indigo-800 leading-tight">
                Monitoring Kasus: #REP-{{ $report->id }}
            </h2>
            <a href="{{ route('dinas.monitoring') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-bold">
                &larr; KEMBALI
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 border-t-4 border-indigo-500">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-100">
                            <h3 class="text-sm font-bold text-indigo-900 uppercase mb-3">Asal Sekolah</h3>
                            <p class="text-lg font-bold text-gray-800">{{ $report->school->nama_sekolah }}</p>
                            <p class="text-sm text-gray-600">{{ $report->school->alamat }}</p>
                        </div>

                        <div>
                            <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest">Informasi Terduga Pelaku</h3>
                            <p class="text-md font-bold text-red-600 mt-1 uppercase">{{ $report->nama_pelaku ?? 'Tidak Disebutkan' }}</p>
                            <p class="text-xs text-gray-500 italic">Kategori: {{ $report->jenis_bullying }}</p>
                        </div>

                        <div>
                            <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest">Waktu & Lokasi Kejadian</h3>
                            <p class="text-gray-800 font-medium">{{ \Carbon\Carbon::parse($report->tanggal_kejadian)->format('d F Y') }}</p>
                            <p class="text-sm text-gray-600">{{ $report->lokasi_kejadian }}</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="flex-1">
                                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest">Status Penanganan</h3>
                                <span class="inline-block mt-2 px-4 py-1 rounded-full text-xs font-black uppercase
                                    {{ $report->status == 'Menunggu' ? 'bg-yellow-100 text-yellow-700 border border-yellow-200' : 
                                       ($report->status == 'Diproses' ? 'bg-blue-100 text-blue-700 border border-blue-200' : 
                                       'bg-green-100 text-green-700 border border-green-200') }}">
                                    {{ $report->status }}
                                </span>
                            </div>
                            <div class="flex-1 border-l pl-4">
                                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest">Identitas Pelapor</h3>
                                <p class="mt-2 font-bold text-gray-700">
                                    {{ $report->is_anonymous ? '--- ANONIM ---' : $report->user->name }}
                                </p>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-200 shadow-inner">
                            <h3 class="text-xs font-bold text-gray-500 uppercase mb-2">Deskripsi Kronologi:</h3>
                            <p class="text-gray-700 italic leading-relaxed text-sm">"{{ $report->deskripsi }}"</p>
                        </div>
                    </div>
                </div>

                @if($report->bukti)
<div class="mt-8">
    <label class="text-xs font-bold text-gray-400 uppercase block mb-3">
        Lampiran Bukti Foto
    </label>

    <img 
        src="{{ asset('storage/' . $report->bukti) }}" 
        alt="Bukti" 
        class="rounded-xl max-w-full h-auto border shadow-sm"
    >
</div>
@endif


            </div>
        </div>
    </div>
</x-app-layout>