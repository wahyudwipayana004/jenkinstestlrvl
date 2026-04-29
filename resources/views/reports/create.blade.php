<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Laporan Bullying') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('report.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="nama_pelaku" value="Nama Pelaku (Jika tahu)" />
                        <x-text-input id="nama_pelaku" class="block mt-1 w-full" type="text" name="nama_pelaku" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="kelas_pelaku" value="Kelas Pelaku" />
                        <x-text-input id="kelas_pelaku" class="block mt-1 w-full" type="text" name="kelas_pelaku" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <x-input-label for="tanggal_kejadian" value="Tanggal Kejadian" />
                            <x-text-input id="tanggal_kejadian" class="block mt-1 w-full" type="date" name="tanggal_kejadian" required />
                        </div>

                        <div>
                            <x-input-label for="lokasi_kejadian" value="Lokasi Kejadian" />
                            <x-text-input id="lokasi_kejadian" class="block mt-1 w-full" type="text" name="lokasi_kejadian" placeholder="Contoh: Kantin, Belakang Kelas" required />
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="jenis_bullying" value="Jenis Bullying" />
                        <select name="jenis_bullying" id="jenis_bullying" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="Fisik">Fisik (Pukulan, dorongan, dll)</option>
                            <option value="Verbal">Verbal (Hinaan, ancaman, dll)</option>
                            <option value="Sosial">Sosial (Dikucilkan, fitnah, dll)</option>
                            <option value="Cyber">Cyber (Media Sosial, chat, dll)</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="deskripsi" value="Kronologi Kejadian" />
                        <textarea id="deskripsi" name="deskripsi" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Ceritakan detail kejadian..." required></textarea>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="bukti" value="Bukti Foto (Opsional)" />
                        <input type="file" name="bukti" id="bukti" class="block mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                        <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, JPEG. Maks: 2MB</p>
                    </div>

                    <div class="block mt-4">
                        <label for="is_anonymous" class="inline-flex items-center">
                            <input id="is_anonymous" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="is_anonymous">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Laporkan sebagai Anonim (Nama Anda tidak akan terlihat)') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Kirim Laporan') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>