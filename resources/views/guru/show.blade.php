<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-green-800 leading-tight">
                {{ __('Periksa Laporan Kasus') }} #{{ $report->id }}
            </h2>
            <a href="{{ route('dashboard') }}" class="text-sm bg-gray-500 text-white px-4 py-2 rounded-lg">Kembali ke Daftar</a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="md:col-span-2 space-y-6">
                    <div class="bg-white shadow-sm sm:rounded-xl p-8 border border-green-100">
                        <h3 class="text-lg font-bold text-green-900 border-b pb-4 mb-6 uppercase tracking-wider">Informasi Kejadian</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase">Tanggal Kejadian</label>
                                <p class="text-gray-800 font-semibold">{{ \Carbon\Carbon::parse($report->tanggal_kejadian)->format('d F Y') }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase">Lokasi Kejadian</label>
                                <p class="text-gray-800 font-semibold">{{ $report->lokasi_kejadian }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase">Kategori Perundungan</label>
                                <p class="mt-1">
                                    <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-xs font-bold border border-blue-200 uppercase">
                                        {{ $report->jenis_bullying }}
                                    </span>
                                </p>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase">Nama Pelaku (Terduga)</label>
                                <p class="text-red-700 font-bold">{{ $report->nama_pelaku ?? 'Rahasia / Tidak Disebutkan' }}</p>
                            </div>
                        </div>

                        <div class="mt-8">
                            <label class="text-xs font-bold text-gray-400 uppercase">Kronologi Kejadian (Input Siswa)</label>
                            <div class="mt-2 p-4 bg-yellow-50 border-l-4 border-yellow-400 text-gray-700 italic leading-relaxed">
                                "{{ $report->deskripsi }}"
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

                <div class="space-y-6">
                    <div class="bg-white shadow-sm sm:rounded-xl p-6 border border-gray-100">
                        <h3 class="text-sm font-bold text-gray-800 mb-4 border-b pb-2">Identitas Pelapor</h3>
                        @if($report->is_anonymous)
                            <div class="flex items-center p-3 bg-purple-50 text-purple-700 rounded-lg border border-purple-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.024 10.024 0 014.132-5.403m1.418-1.075A10.048 10.048 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.403m-1.418 1.075L3 3m3.245 2.138a3 3 0 004.243 4.243m4.242 4.242a3 3 0 01-4.243-4.243" />
                                </svg>
                                <span class="font-bold text-xs uppercase tracking-tight">Laporan Anonim</span>
                            </div>
                            <p class="text-[10px] text-gray-400 mt-2 italic">*Nama pelapor disembunyikan sesuai permintaan siswa.</p>
                        @else
                            <div class="flex items-center">
                                <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-700 font-bold mr-3">
                                    {{ substr($report->user->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900">{{ $report->user->name }}</p>
                                    <p class="text-xs text-gray-500">Siswa Pelapor</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="bg-white shadow-sm sm:rounded-xl p-6 border border-green-200">
                        <h3 class="text-sm font-bold text-gray-800 mb-4 border-b pb-2">Tindakan Guru BK</h3>
                        <form action="{{ route('guru.report.updateStatus', $report->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="space-y-4">
                                <div>
                                    <label class="text-[10px] font-bold text-gray-400 uppercase">Ubah Status Laporan</label>
                                    <select name="status" class="mt-1 block w-full rounded-md border-gray-300 text-sm">
                                        <option value="Menunggu" {{ $report->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                        <option value="Diproses" {{ $report->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="Selesai" {{ $report->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </div>
                                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 rounded-lg text-xs transition">
                                    Simpan Perubahan
                                </button>
                                <a href="{{ route('guru.report.export', $report->id) }}" class="flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg text-xs transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                    </svg>
                                             CETAK PDF
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>