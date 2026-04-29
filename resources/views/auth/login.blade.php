<x-guest-layout>
    <div class="mb-6 text-white">
        <h2 class="text-2xl font-bold mb-1">Selamat datang di</h2>
        <h1 class="text-4xl font-extrabold text-blue-300 drop-shadow-lg">Portal Pengaduan Bullying</h1>
    </div>

    <div class="flex gap-4 mb-8">
    <button type="button" class="flex-1 flex items-center justify-center gap-3 bg-white/10 hover:bg-white/20 border border-white/10 text-white px-4 py-2.5 rounded-xl transition duration-200 group">
        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" viewBox="0 0 24 24">
            <path fill="#ea4335" d="M5.266 9.765A7.077 7.077 0 0 1 12 4.909c1.69 0 3.218.6 4.418 1.582L19.91 3C17.782 1.145 15.055 0 12 0 7.27 0 3.198 2.698 1.24 6.65l4.026 3.115z"/>
            <path fill="#34a853" d="M16.04 18.013c-1.09.693-2.454 1.078-4.04 1.078a7.077 7.077 0 0 1-6.723-4.823l-4.04 3.122C3.199 21.302 7.271 24 12 24c3.11 0 5.924-1.156 8.05-3.052l-4.01-2.935z"/>
            <path fill="#4285f4" d="M23.49 12.275c0-.826-.074-1.62-.21-2.387H12v4.513h6.44c-.278 1.459-1.102 2.7-2.34 3.527l4.01 2.935c2.344-2.163 3.694-5.352 3.694-8.588z"/>
            <path fill="#fbbc05" d="M5.277 14.268a7.12 7.12 0 0 1 0-4.503L1.25 6.65A11.967 11.967 0 0 0 0 12c0 1.92.445 3.73 1.237 5.335l4.04-3.067z"/>
        </svg>
        <span class="text-sm font-medium">Sign in with Google</span>
    </button>

    <button type="button" class="p-2.5 bg-white/10 hover:bg-white/20 border border-white/10 rounded-xl transition group">
        <svg class="w-5 h-5 text-blue-500 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
    </button>
</div>

    <p class="text-xs text-gray-400 mb-4">Atau gunakan alamat email Anda</p>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-300">Alamat Email</label>
            <x-text-input id="email" class="block w-full mt-1 bg-gray-800 border-gray-700 text-white placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500 rounded-lg" 
                type="email" name="email" :value="old('email')" required autofocus placeholder="username@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-300">Kata Sandi</label>
            <x-text-input id="password" class="block w-full mt-1 bg-gray-800 border-gray-700 text-white placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500 rounded-lg"
                type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-700 bg-gray-800 text-blue-500 shadow-sm focus:ring-blue-500" name="remember">
                <span class="ml-2 text-sm text-gray-400">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-blue-400 hover:text-blue-300 transition-colors" href="{{ route('password.request') }}">
                    Lupa sandi?
                </a>
            @endif
        </div>

        <div>
            <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 shadow-md">
                MASUK KE SISTEM
            </button>
        </div>
    </form>

    <div class="text-center mt-6 text-sm text-gray-400">
        Belum punya akun? 
        <a href="{{ route('register') }}" class="font-bold text-blue-400 hover:text-blue-300 transition-colors">Daftar Sekarang</a>
    </div>
</x-guest-layout>