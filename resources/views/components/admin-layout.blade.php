<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-50 text-slate-900 selection:bg-emerald-500 selection:text-white" style="font-family: 'Inter', sans-serif;">

        <!-- Mobile overlay -->
        <div id="mobile-overlay" class="fixed inset-0 bg-black/40 z-20 backdrop-blur-sm hidden"></div>

        <!-- Sidebar (always in DOM, toggled via class) -->
        <aside id="sidebar" class="fixed top-0 left-0 h-full w-72 bg-white border-r border-slate-200 flex flex-col z-30 shadow-[4px_0_24px_rgba(0,0,0,0.04)] -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
            <!-- Logo -->
            <div class="h-16 lg:h-20 flex items-center px-8 border-b border-slate-100 shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 lg:w-10 lg:h-10 bg-emerald-500 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-500/30">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <h1 class="font-bold text-xl tracking-tight text-slate-800">Admin<span class="text-emerald-500">Panel</span></h1>
                </div>
            </div>
            
            <!-- Nav Links -->
            <div class="px-6 py-8 flex-1 overflow-y-auto">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 px-2">Menu</p>
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-50 text-emerald-600 border border-emerald-100 shadow-sm font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800 font-medium border border-transparent' }} rounded-2xl transition-all">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.users') ? 'bg-emerald-50 text-emerald-600 border border-emerald-100 shadow-sm font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800 font-medium border border-transparent' }} rounded-2xl transition-all">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        All Users
                    </a>
                    <a href="{{ route('admin.leaderboard') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.leaderboard') ? 'bg-emerald-50 text-emerald-600 border border-emerald-100 shadow-sm font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800 font-medium border border-transparent' }} rounded-2xl transition-all">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        Leaderboard
                    </a>
                    <a href="{{ route('admin.analytics') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.analytics') ? 'bg-emerald-50 text-emerald-600 border border-emerald-100 shadow-sm font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800 font-medium border border-transparent' }} rounded-2xl transition-all">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                        Analytics
                    </a>
                </nav>
            </div>
            
            <!-- Bottom Actions -->
            <div class="p-6 border-t border-slate-100 bg-slate-50/50 shrink-0">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:bg-white hover:text-slate-800 hover:shadow-sm rounded-2xl font-semibold transition-all mb-2 border border-transparent hover:border-slate-200">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Return to User App
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50 rounded-2xl font-semibold transition-colors border border-transparent hover:border-red-100">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout
                    </button>
                </form>

                <div class="mt-6 pt-6 border-t border-slate-200/50 flex flex-col items-center justify-center gap-2">
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">An Initiative By</span>
                    <img src="{{ asset('swaaha-logo.png') }}" alt="Swaaha Logo" class="h-6 object-contain opacity-75 grayscale hover:grayscale-0 hover:opacity-100 transition-all">
                </div>
            </div>
        </aside>

        <!-- Page wrapper: offset content on desktop to make room for sidebar -->
        <div class="lg:pl-72 flex flex-col min-h-screen">

            <!-- Top bar (mobile: hamburger + title, desktop: page title + avatar) -->
            <header class="h-16 lg:h-20 bg-white/90 backdrop-blur-md border-b border-slate-200 flex items-center justify-between px-5 lg:px-10 sticky top-0 z-10 shadow-sm">
                <div class="flex items-center gap-4">
                    <!-- Hamburger (mobile only) -->
                    <button id="mobile-menu-btn" class="lg:hidden p-2 -ml-2 rounded-xl text-slate-500 hover:bg-slate-100 transition-colors" aria-label="Open menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    <h2 class="text-base lg:text-xl font-bold text-slate-800">Overview</h2>
                </div>
                <div class="w-9 h-9 rounded-full bg-slate-100 flex items-center justify-center border border-slate-200 text-slate-600 font-bold shadow-sm text-sm">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
            </header>

            <!-- Main content -->
            <main class="flex-1 p-5 lg:p-10">
                <div class="max-w-7xl mx-auto">
                    {{ $slot }}
                </div>
            </main>

        </div>

        <script>
            (function() {
                var btn = document.getElementById('mobile-menu-btn');
                var sidebar = document.getElementById('sidebar');
                var overlay = document.getElementById('mobile-overlay');

                function open() {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                }

                function close() {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                    document.body.style.overflow = '';
                }

                btn.addEventListener('click', open);
                overlay.addEventListener('click', close);
            })();
        </script>

    </body>
</html>