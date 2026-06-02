<x-admin-layout>
    <div class="mb-10">
        <h3 class="font-extrabold text-slate-900 text-3xl tracking-tight mb-2">Admin Dashboard</h3>
        <p class="text-slate-500 font-medium">Monitor your application's impact and user growth.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        <!-- Stat Card 1 -->
        <div class="bg-white rounded-[2rem] p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 relative overflow-hidden group hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all duration-300">
            <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:scale-110 transition-transform duration-500">
                <svg class="w-24 h-24 text-indigo-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            </div>
            <div class="relative z-10">
                <div class="w-14 h-14 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-500 mb-6">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <p class="text-slate-500 text-sm font-bold uppercase tracking-widest mb-2">Total Users</p>
                <p class="text-5xl font-black text-slate-800">{{ number_format($totalUsers) }}</p>
            </div>
        </div>
        
        <!-- Stat Card 2 -->
        <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-[2rem] p-8 shadow-[0_8px_30px_rgb(16,185,129,0.3)] border border-emerald-400 relative overflow-hidden group hover:shadow-[0_8px_30px_rgb(16,185,129,0.5)] transition-all duration-300">
            <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:scale-110 transition-transform duration-500">
                <svg class="w-24 h-24 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/></svg>
            </div>
            <div class="relative z-10 text-white">
                <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center text-white mb-6 backdrop-blur-md border border-white/20 shadow-inner">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-emerald-50 text-sm font-bold uppercase tracking-widest mb-2">Carbon Tracked</p>
                <div class="flex items-baseline gap-2">
                    <p class="text-5xl font-black">{{ number_format($totalCarbon, 1) }}</p>
                    <span class="text-xl font-bold opacity-80">kg</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table -->
    <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden">
        <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
            <div>
                <h4 class="text-lg font-bold text-slate-800">City Statistics</h4>
                <p class="text-sm text-slate-500 font-medium mt-1">{{ $activeCities }} Active Cities</p>
            </div>
        </div>
        
        <div class="divide-y divide-slate-100">
            @forelse($cityStats as $index => $stat)
            <div class="px-8 py-5 flex items-center justify-between hover:bg-slate-50 transition-colors group">
                <div class="flex items-center gap-5">
                    <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-500 flex justify-center items-center font-bold text-base group-hover:bg-indigo-50 group-hover:text-indigo-600 transition-colors">
                        #{{ $index + 1 }}
                    </div>
                    <div>
                        <span class="font-bold text-slate-800 text-lg block">{{ $stat->city ?? 'Unknown' }}</span>
                    </div>
                </div>
                <div class="text-right flex items-center gap-4">
                    <div class="text-left min-w-[80px]">
                        <span class="font-black text-slate-800 text-2xl block">{{ $stat->count }}</span>
                        <span class="text-xs text-slate-400 font-bold uppercase tracking-widest">Users</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="px-8 py-16 text-center text-slate-400 font-medium">
                No city data available yet.
            </div>
            @endforelse
        </div>
    </div>
</x-admin-layout>
