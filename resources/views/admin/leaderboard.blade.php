<x-admin-layout>
    <div class="mb-10">
        <h3 class="font-extrabold text-slate-900 text-3xl tracking-tight mb-2">Global Leaderboard</h3>
        <p class="text-slate-500 font-medium">Top users ranked by minimum carbon footprint.</p>
    </div>

    <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden mb-8 max-w-4xl">
        <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
            <div>
                <h4 class="text-lg font-bold text-slate-800">Top {{ $users->count() }} Eco-Warriors</h4>
            </div>
            <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
        
        <div class="divide-y divide-slate-100">
            @forelse($users as $index => $user)
            <div class="px-8 py-5 flex items-center justify-between hover:bg-slate-50 transition-colors group">
                <div class="flex items-center gap-6">
                    <div class="w-14 h-14 rounded-2xl flex justify-center items-center font-black text-xl shadow-sm border
                        @if($index === 0) bg-amber-100 text-amber-600 border-amber-200
                        @elseif($index === 1) bg-slate-200 text-slate-600 border-slate-300
                        @elseif($index === 2) bg-orange-100 text-orange-600 border-orange-200
                        @else bg-slate-50 text-slate-400 border-slate-100 @endif">
                        {{ $index + 1 }}
                    </div>
                    
                    <div>
                        <div class="flex items-center gap-3">
                            <span class="font-extrabold text-slate-800 text-lg block">{{ $user->name }}</span>
                            @if($index === 0) <span class="text-xl">👑</span> @endif
                        </div>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-xs text-slate-500 font-bold uppercase">{{ $user->city ?? 'Earth' }}</span>
                            <span class="text-slate-300">&bull;</span>
                            <span class="text-xs text-emerald-600 font-bold bg-emerald-50 px-2 py-0.5 rounded-md">{{ $user->profession ?? 'Eco Warrior' }}</span>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <span class="font-black text-slate-800 text-2xl block">{{ number_format($user->total_carbon, 1) }} <span class="text-sm text-slate-400 font-bold">KG</span></span>
                    <span class="text-xs text-emerald-500 font-bold uppercase tracking-widest mt-1 block">{{ ceil($user->total_carbon / 21) }} Trees Debt</span>
                </div>
            </div>
            @empty
            <div class="px-8 py-16 text-center text-slate-400 font-medium">
                No users found.
            </div>
            @endforelse
        </div>
        
        @if($users->hasPages())
        <div class="px-8 py-5 border-t border-slate-100 bg-slate-50/30">
            {{ $users->links() }}
        </div>
        @endif
    </div>
</x-admin-layout>
