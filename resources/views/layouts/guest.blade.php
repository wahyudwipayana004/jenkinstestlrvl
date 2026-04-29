<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Login | Portal Pengaduan Bullying</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
    body {
        font-family: 'Inter', sans-serif;
    }
    /* Background gelap */
    .bg-portal-dark {
        background: radial-gradient(circle at center, #1e293b 0%, #0f172a 100%);
        position: relative;
        overflow: hidden;
    }
    /* Efek titik-titik */
    .bg-portal-dark::before {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px);
        background-size: 30px 30px;
        z-index: 0;
    }

    /* Lingkaran Putih dengan Animasi Gerak */
    .logo-container {
        position: absolute;
        right: 12%; 
        top: 50%;
        /* Gabungan animasi pulse dan float */
        animation: pulse-ring 3s infinite ease-in-out alternate, float 6s infinite ease-in-out;
        width: 480px; 
        height: 480px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #ffffff; 
        border-radius: 50%;
        padding: 40px;
        z-index: 1;
        box-shadow: 0 0 80px rgba(255, 255, 255, 0.15);
    }

    .logo-container img {
        max-width: 85%;
        max-height: 85%;
        object-fit: contain;
    }

    /* Animasi 1: Membesar Mengecil (Pulse) */
    @keyframes pulse-ring {
        0% { transform: translateY(-50%) scale(0.98); box-shadow: 0 0 50px rgba(255, 255, 255, 0.1); }
        100% { transform: translateY(-50%) scale(1.03); box-shadow: 0 0 100px rgba(255, 255, 255, 0.25); }
    }

    /* Animasi 2: Mengambang Naik Turun Pelan (Float) */
    @keyframes float {
        0%, 100% { margin-top: 0px; }
        50% { margin-top: -20px; }
    }

    /* Form Glassmorphism */
    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    }

    @media (min-width: 1024px) {
        .main-layout {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding-left: 10%;
        }
    }
    @media (max-width: 1023px) {
        .logo-container { display: none; }
        .main-layout { justify-content: center; }
    }
</style>
    </head>
    <div class="min-h-screen bg-portal-dark flex flex-col justify-between relative p-6">
    
    <div class="flex-grow flex items-center justify-center lg:justify-start lg:pl-[10%]">
        
        <div class="logo-container hidden lg:flex">
            <img src="{{ asset('images/PEMKAB BADUNG.png') }}" alt="Logo Badung">
        </div>

        <div class="w-full max-w-md glass-card p-10 rounded-3xl relative z-10">
            {{ $slot }}
        </div>
    </div>

    <div class="w-full text-center py-4 text-xs text-gray-500 z-10">
        &copy; {{ date('Y') }} Portal Pengaduan Bullying Kab. Badung. Aman & Terpercaya.
    </div>
</div>
    </body>
</html>