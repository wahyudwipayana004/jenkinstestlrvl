<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-blue-600 leading-tight">
                {{ __('Rincian Laporan Kejadian') }}
            </h2>
            <a href="{{ route('siswa.report.index') }}" class="flex items-center gap-2 text-sm bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-8 border border-gray-100">
                
                <div class="flex justify-between items-start border-b border-gray-100 pb-6 mb-6">
                    <div>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">ID Laporan</span>
                        <h3 class="text-2xl font-black text-gray-800">#REP-{{ str_pad($report->id, 5, '0', STR_PAD_LEFT) }}</h3>
                    </div>
                    <div class="text-right">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-1">Status Saat Ini</span>
                        @if($report->status == 'pending')
                            <span class="px-4 py-1.5 bg-yellow-100 text-yellow-700 rounded-full text-xs font-bold uppercase italic shadow-sm">Menunggu Verifikasi</span>
                        @else
                            <span class="px-4 py-1.5 bg-green-100 text-green-700 rounded-full text-xs font-bold uppercase shadow-sm">Selesai Diproses</span>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    <div class="space-y-4">
                        <div>
                            <label class="text-xs font-semibold text-gray-500 uppercase">Tanggal Kejadian</label>
                            <p class="text-gray-900 font-medium">{{ \Carbon\Carbon::parse($report->tanggal_kejadian)->format('d F Y') }}</p>
                        </div>

                        <div>
                            <label class="text-xs font-semibold text-gray-500 uppercase">Lokasi Kejadian</label>
                            <p class="text-gray-900 font-medium">{{ $report->lokasi_kejadian }}</p>
                        </div>

                        <div>
                            <label class="text-xs font-semibold text-gray-500 uppercase">Jenis Perundungan</label>
                            <p class="mt-1">
                                <span class="px-3 py-1 bg-blue-50 text-blue-700 border border-blue-100 rounded-lg text-sm font-bold">
                                    {{ $report->jenis_bullying }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="text-xs font-semibold text-gray-500 uppercase">Nama Pelaku</label>
                            <p class="text-gray-900 font-medium">{{ $report->nama_pelaku ?? 'Tidak Disebutkan' }}</p>
                        </div>

                        <div>
    <label class="text-xs font-bold text-gray-500 uppercase tracking-wider">Metode Pelaporan</label>
    <div class="mt-2">
        @if($report->is_anonymous)
            <div class="inline-flex items-center px-3 py-1.5 rounded-lg bg-purple-50 border border-purple-100 text-purple-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.024 10.024 0 014.132-5.403m1.418-1.075A10.048 10.048 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.403m-1.418 1.075L3 3m3.245 2.138a3 3 0 004.243 4.243m4.242 4.242a3 3 0 01-4.243-4.243" />
                </svg>
                <span class="text-sm font-bold">Rahasia (Anonim)</span>
            </div>
            <p class="text-[10px] text-gray-400 mt-1">*Identitas Anda disembunyikan dari petugas.</p>
        @else
            <div class="inline-flex items-center px-3 py-1.5 rounded-lg bg-green-50 border border-green-100 text-green-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="text-sm font-bold">Terbuka (Publik)</span>
            </div>
            <p class="text-[10px] text-gray-400 mt-1">*Nama Anda dapat dilihat oleh pihak sekolah.</p>
        @endif
    </div>
</div>
                    </div>
                </div>

                <div class="mt-10 pt-6 border-t border-gray-100">
                    <label class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-3">Kronologi Kejadian</label>
                    <div class="bg-blue-50/50 p-6 rounded-2xl border border-blue-100/50">
                        <p class="text-gray-700 leading-relaxed italic">
                            "{{ $report->deskripsi }}"
                        </p>
                    </div>
                </div>

                @if($report->bukti)
                <div class="mt-10">
                    <label class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-3">Lampiran Bukti</label>
                    <div class="relative inline-block">
                        <img 
                            src="{{ asset('storage/' . $report->bukti) }}"
                            alt="Bukti"
                            class="rounded-xl max-w-full h-auto border shadow-sm">
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>