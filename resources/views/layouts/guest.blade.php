<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- PWA Meta Tags -->
        <link rel="manifest" href="{{ asset('manifest.json') }}">
        <meta name="theme-color" content="#10b981">
        <link rel="apple-touch-icon" href="{{ asset('logo.jpeg') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <script>
            if ('serviceWorker' in navigator) {
                window.addEventListener('load', () => {
                    navigator.serviceWorker.register('{{ asset('sw.js') }}');
                });
            }
        </script>
        <style>
            html, body {
                overscroll-behavior: none;
                width: 100%;
                min-height: 100%;
            }
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
    </head>
    <body class="font-sans text-gray-900 antialiased w-full min-h-screen flex justify-center items-start sm:items-center p-0 sm:p-4 relative bg-slate-50">
        <!-- Animated Background Elements -->
        <div class="fixed top-[-10%] left-[-10%] w-96 h-96 bg-emerald-400 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob pointer-events-none"></div>
        <div class="fixed top-[20%] right-[-10%] w-96 h-96 bg-teal-300 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob animation-delay-2000 pointer-events-none"></div>
        <div class="fixed bottom-[-20%] left-[20%] w-96 h-96 bg-green-300 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob animation-delay-4000 pointer-events-none"></div>

        <div class="w-full min-h-screen sm:min-h-0 sm:h-auto max-w-[420px] bg-white/60 backdrop-blur-2xl rounded-none sm:rounded-[2rem] border-0 sm:border sm:border-white/60 sm:shadow-[0_8px_32px_0_rgba(31,38,135,0.07)] relative z-10 flex flex-col p-6 sm:p-10 transition-all duration-300 sm:hover:shadow-[0_8px_40px_0_rgba(31,38,135,0.1)]">
            
            <div class="text-center mb-6 shrink-0 flex flex-col items-center pt-4 sm:pt-0">
                <div class="w-20 h-20 sm:w-24 sm:h-24 bg-white rounded-[1.25rem] shadow-sm flex items-center justify-center mb-4 sm:mb-6 p-2 border border-white/50">
                    <img src="{{ asset('logo.jpeg') }}" alt="Logo" class="w-full h-full object-contain mix-blend-multiply">
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight mb-2">
                    {{ config('app.name', 'Green Footprints') }}
                </h1>
                <p class="text-slate-500 text-sm font-medium hidden sm:block">Your step towards a sustainable future.</p>
            </div>

            {{-- Show all validation errors as an alert banner --}}
            @if ($errors->any())
                <div class="mb-6 shrink-0 bg-red-50 border border-red-200 text-red-700 rounded-2xl px-5 py-4 text-sm font-semibold flex items-start gap-3">
                    <svg class="w-5 h-5 shrink-0 mt-0.5 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M12 3a9 9 0 110 18A9 9 0 0112 3z"/></svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <div class="w-full mb-6 flex-1 shrink-0">
                {{ $slot }}
            </div>

            <div class="mt-auto pt-4 pb-8 sm:pb-0 shrink-0 border-t border-slate-200/50 flex flex-col items-center justify-center gap-2">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">An Initiative By</span>
                <img src="{{ asset('swaaha-logo.png') }}" alt="Swaaha Logo" class="h-5 sm:h-6 object-contain opacity-80">
            </div>
        </div>
    </body>
</html>
