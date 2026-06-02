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
    <body class="font-sans antialiased bg-slate-50 text-slate-900 flex h-screen overflow-hidden selection:bg-emerald-500 selection:text-white" style="font-family: 'Inter', sans-serif;">
        
        <!-- Sidebar -->
        <aside class="w-72 bg-white border-r border-slate-200 flex flex-col h-full z-20 shadow-[4px_0_24px_rgba(0,0,0,0.02)]">
            <div class="h-20 flex items-center px-8 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-emerald-500 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-500/30">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <h1 class="font-bold text-xl tracking-tight text-slate-800">Admin<span class="text-emerald-500">Panel</span></h1>
                </div>
            </div>
            
            <div class="px-6 py-8 flex-1 overflow-y-auto">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 px-2">Menu</p>
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-50 text-emerald-600 border border-emerald-100 shadow-sm font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800 font-medium border border-transparent' }} rounded-2xl transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Dashboard
                    </a>
                    
                    <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.users') ? 'bg-emerald-50 text-emerald-600 border border-emerald-100 shadow-sm font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800 font-medium border border-transparent' }} rounded-2xl transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        All Users
                    </a>
                    
                    <a href="{{ route('admin.leaderboard') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.leaderboard') ? 'bg-emerald-50 text-emerald-600 border border-emerald-100 shadow-sm font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800 font-medium border border-transparent' }} rounded-2xl transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        Leaderboard
                    </a>
                    
                    <a href="{{ route('admin.analytics') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.analytics') ? 'bg-emerald-50 text-emerald-600 border border-emerald-100 shadow-sm font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800 font-medium border border-transparent' }} rounded-2xl transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                        Analytics
                    </a>
                </nav>
            </div>
            
            <div class="p-6 border-t border-slate-100 bg-slate-50/50">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:bg-white hover:text-slate-800 hover:shadow-sm rounded-2xl font-semibold transition-all mb-2 border border-transparent hover:border-slate-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Return to User App
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50 rounded-2xl font-semibold transition-colors border border-transparent hover:border-red-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 h-full overflow-y-auto relative bg-[#f8fafc]">
            <!-- Header -->
            <header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-200 px-10 flex justify-between items-center sticky top-0 z-10">
                <h2 class="text-xl font-bold text-slate-800">Overview</h2>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center border border-slate-200 text-slate-600 font-bold shadow-sm">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </header>
            
            <div class="p-10 max-w-7xl mx-auto">
                {{ $slot }}
            </div>
        </main>

    </body>
</html>