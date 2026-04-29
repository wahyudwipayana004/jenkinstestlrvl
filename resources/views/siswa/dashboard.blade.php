<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">Portal Pelaporan Siswa</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-100 border-l-4 border-blue-500 p-4 mb-6">
                <p class="text-sm text-blue-700">Selamat datang, <strong>{{ auth()->user()->name }}</strong>. Privasi Anda terlindungi oleh sistem kami.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-lg font-bold mb-2">Punya Laporan Baru?</h3>
                    <p class="text-gray-600 mb-4 text-sm">Laporkan tindakan bullying yang Anda alami atau lihat segera.</p>
                    <a href="{{ route('siswa.report.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Buat Laporan Sekarang</a>
                </div>

                <div class="p-6 bg-white border-b border-gray-200 shadow-sm rounded-lg">
                 <h3 class="font-bold text-lg mb-2">Riwayat Laporan</h3>
    <p class="text-4xl font-bold text-blue-600 mb-2">
        {{ \App\Models\Report::where('user_id', auth()->id())->count() }}
    </p>
    <p class="text-sm text-gray-500 mb-4">Total laporan yang Anda kirimkan.</p>
    <a href="{{ route('siswa.report.index') }}" class="text-blue-600 hover:underline text-sm font-semibold">
        Lihat Semua Riwayat &rarr;
    </a>
</div>
            </div>
        </div>
    </div>
</x-app-layout>