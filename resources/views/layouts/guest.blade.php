<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- PWA Meta Tags -->
        <link rel="manifest" href="/manifest.json">
        <meta name="theme-color" content="#10b981">
        <link rel="apple-touch-icon" href="/logo.jpeg">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <script>
            if ('serviceWorker' in navigator) {
                window.addEventListener('load', () => {
                    navigator.serviceWorker.register('/sw.js');
                });
            }
        </script>
    </head>
    <body class="font-sans text-gray-900 antialiased min-h-screen flex justify-center items-center p-4 relative overflow-hidden bg-slate-50">
        
        <!-- Animated Background Elements -->
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-emerald-400 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob"></div>
        <div class="absolute top-[20%] right-[-10%] w-96 h-96 bg-teal-300 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-[-20%] left-[20%] w-96 h-96 bg-green-300 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob animation-delay-4000"></div>
        
        <style>
            @keyframes blob {
                0% { transform: translate(0px, 0px) scale(1); }
                33% { transform: translate(30px, -50px) scale(1.1); }
                66% { transform: translate(-20px, 20px) scale(0.9); }
                100% { transform: translate(0px, 0px) scale(1); }
            }
            .animate-blob { animation: blob 7s infinite; }
            .animation-delay-2000 { animation-delay: 2s; }
            .animation-delay-4000 { animation-delay: 4s; }
            /* Hide scrollbar */
            .no-scrollbar::-webkit-scrollbar { display: none; }
            .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        </style>

        <div class="w-full max-w-[420px] max-h-[95vh] overflow-y-auto no-scrollbar bg-white/40 backdrop-blur-2xl rounded-[2rem] border border-white/60 shadow-[0_8px_32px_0_rgba(31,38,135,0.07)] relative z-10 flex flex-col p-8 sm:p-10 transition-all duration-300 hover:shadow-[0_8px_40px_0_rgba(31,38,135,0.1)]">
            
            <div class="text-center mb-10 flex flex-col items-center">
                <div class="w-24 h-24 bg-white rounded-[1.25rem] shadow-sm flex items-center justify-center mb-6 p-2 border border-white/50">
                    <img src="{{ asset('logo.jpeg') }}" alt="Logo" class="w-full h-full object-contain mix-blend-multiply">
                </div>
                <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight mb-2">
                    {{ config('app.name', 'Green Footprints') }}
                </h1>
                <p class="text-slate-500 text-sm font-medium">Your step towards a sustainable future.</p>
            </div>

            <div class="w-full">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
