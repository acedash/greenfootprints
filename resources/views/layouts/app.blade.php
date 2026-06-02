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
    <body class="font-sans antialiased h-[100dvh] w-full flex justify-center items-center sm:p-4 relative overflow-hidden bg-slate-50">
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
            /* Hide scrollbar for Chrome, Safari and Opera */
            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }
            /* Hide scrollbar for IE, Edge and Firefox */
            .no-scrollbar {
                -ms-overflow-style: none;  /* IE and Edge */
                scrollbar-width: none;  /* Firefox */
            }
        </style>

        <div class="w-full max-w-[480px] h-[100dvh] sm:h-[85vh] bg-white/80 backdrop-blur-xl sm:rounded-[2.5rem] shadow-none sm:shadow-[0_20px_50px_rgba(8,_112,_184,_0.15)] relative z-10 flex flex-col overflow-hidden border border-white/50">
            <!-- Page Content (scrollable) -->
            <main class="flex-1 overflow-y-auto no-scrollbar pb-24 pt-8">
                {{ $slot }}
            </main>

            <!-- Bottom Navigation Bar -->
            <div class="absolute bottom-0 inset-x-0 h-20 bg-white/90 backdrop-blur-lg border-t border-white/50 flex justify-between items-center px-8 z-40 rounded-b-[2rem]">
                <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-center text-emerald-600 gap-1">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 12h3v8h6v-6h2v6h6v-8h3L12 2z"/></svg>
                </a>
                <a href="{{ route('history') }}" class="flex flex-col items-center justify-center text-gray-400 hover:text-emerald-500 transition-colors gap-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </a>
                <a href="{{ route('leaderboard') }}" class="flex flex-col items-center justify-center text-gray-400 hover:text-emerald-500 transition-colors gap-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="flex flex-col items-center justify-center text-gray-400 gap-1">
                    @csrf
                    <button type="submit" class="hover:text-red-500 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    </button>
                </form>
            </div>
            
        </div>
    </body>
</html>
