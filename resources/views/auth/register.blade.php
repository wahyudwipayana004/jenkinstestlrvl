<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" value="Nama Lengkap" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="nisn" value="NISN" />
            <x-text-input id="nisn" class="block mt-1 w-full" type="text" name="nisn" :value="old('nisn')" required />
            <x-input-error :messages="$errors->get('nisn')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="jenis_kelamin" value="Jenis Kelamin" />
            <select name="jenis_kelamin" id="jenis_kelamin" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
        </div>

        <div class="mt-4">
    <x-input-label for="school_id" value="Asal Sekolah" />
    <select name="school_id" id="school_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
        <option value="">-- Pilih Sekolah --</option>
        @foreach(\App\Models\School::all() as $school)
            <option value="{{ $school->id }}" {{ old('school_id') == $school->id ? 'selected' : '' }}>
                {{ $school->nama_sekolah }}
            </option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('school_id')" class="mt-2" />
</div>

        <div class="mt-4">
            <x-input-label for="kelas" value="Kelas" />
            <x-text-input id="kelas" class="block mt-1 w-full" type="text" name="kelas" :value="old('kelas')" required />
            <x-input-error :messages="$errors->get('kelas')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="alamat" value="Alamat" />
            <textarea id="alamat" name="alamat" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('alamat') }}</textarea>
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Password" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Konfirmasi Password" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4  ">
            <a class="underline text-sm text-gray-300 hover:text-gray-900" href="{{ route('login') }}">
                Sudah punya akun?
            </a>
            <x-primary-button class="ml-4 mt-1">Daftar Sebagai Siswa</x-primary-button>
        </div>
    </form>
</x-guest-layout>