<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-600 leading-tight">
            {{ __('Buat Laporan Perundungan (Bullying)') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-8 border border-gray-100">
                <form action="{{ route('siswa.report.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Kejadian</label>
                        <input type="date" name="tanggal_kejadian" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Lokasi Kejadian</label>
                        <input type="text" name="lokasi_kejadian" placeholder="Misal: Kantin, Kelas X, Belakang Sekolah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Perundungan</label>
                        <select name="jenis_bullying" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Fisik">Fisik (Pukulan, Dorongan, dll)</option>
                            <option value="Verbal">Verbal (Ejekan, Kata-kata kasar)</option>
                            <option value="Cyber">Cyber (Sosial Media, Chat)</option>
                            <option value="Seksual">Pelecehan Seksual</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Pelaku (Opsional)</label>
                            <input type="text" name="nama_pelaku" placeholder="Tulis nama pelaku jika tahu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="flex items-center">
                         <input type="checkbox" name="is_anonymous" id="is_anonymous" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                        <label for="is_anonymous" class="ml-2 block text-sm text-gray-600">
                            Kirim sebagai Anonim (Nama Anda tidak akan terlihat oleh petugas)
                        </label>
                    </div>  
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Ceritakan Kejadian</label>
                        <textarea name="deskripsi" rows="4" placeholder="Jelaskan kronologi kejadian secara singkat..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Upload Bukti (Opsional)</label>
                        <input type="file" name="bukti" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>

                    <div class="flex items-center justify-end pt-4">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition shadow-md">
                            Kirim Laporan Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>