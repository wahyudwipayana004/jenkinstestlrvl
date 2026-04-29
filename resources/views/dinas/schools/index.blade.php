<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manajemen Data Sekolah</h2>
            <button onclick="openModal('addModal')" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-bold transition">
                + Tambah Sekolah
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white p-6 shadow rounded-xl overflow-hidden">
                <table class="w-full border-collapse">
                    <thead class="bg-gray-50 uppercase text-xs font-bold text-gray-600">
                        <tr>
                            <th class="p-4 border-b text-left">Nama Sekolah</th>
                            <th class="p-4 border-b text-left">Alamat</th>
                            <th class="p-4 border-b text-center">Total Laporan</th>
                            <th class="p-4 border-b text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schools as $school)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 border-b font-medium">{{ $school->nama_sekolah }}</td>
                            <td class="p-4 border-b text-gray-600 text-sm">{{ $school->alamat }}</td>
                            <td class="p-4 border-b text-center font-bold text-blue-600">{{ $school->reports_count }}</td>
                            <td class="p-4 border-b text-center">
                               <button type="button" 
                                        class="edit-button text-blue-600 font-bold mr-3 text-xs uppercase"
                                            data-id="{{ $school->id }}"
                                            data-nama="{{ $school->nama_sekolah }}"
                                            data-alamat="{{ $school->alamat }}">
                                                Edit
                                </button>
                                
                                <form action="{{ route('dinas.schools.destroy', $school->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-xs uppercase" onclick="return confirm('Hapus sekolah ini? Semua data terkait mungkin akan terpengaruh.')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="addModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden z-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6">
            <h3 class="text-lg font-bold mb-4">Tambah Sekolah Baru</h3>
            <form action="{{ route('dinas.schools.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-1">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" class="w-full border rounded p-2" placeholder="Contoh: SMKN 1 Jakarta" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-1">Alamat</label>
                    <textarea name="alamat" class="w-full border rounded p-2" rows="3" required></textarea>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal('addModal')" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden z-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6">
            <h3 class="text-lg font-bold mb-4">Edit Data Sekolah</h3>
            <form id="editForm" method="POST">
                @csrf @method('PUT')
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-1">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" id="edit_nama" class="w-full border rounded p-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-1">Alamat</label>
                    <textarea name="alamat" id="edit_alamat" class="w-full border rounded p-2" rows="3" required></textarea>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal('editModal')" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-orange-600 text-white px-4 py-2 rounded">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }

        function editSchool(school) {
            // Set data ke input modal
            document.getElementById('edit_nama').value = school.nama_sekolah;
            document.getElementById('edit_alamat').value = school.alamat;
            
            // Set action form ke URL yang benar (Contoh: /dinas/schools/5)
            document.getElementById('editForm').action = '/dinas/schools/' + school.id;
            
            openModal('editModal');
        }

        // Menutup modal jika klik di luar area modal
        window.onclick = function(event) {
            if (event.target.classList.contains('bg-opacity-50')) {
                event.target.classList.add('hidden');
            }
        }
    </script>
</x-app-layout>