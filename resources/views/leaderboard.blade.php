<x-app-layout>
    <div class="px-6 py-4">
        <div class="flex items-center gap-4 mb-6">
            <h3 class="font-bold text-gray-800 text-2xl w-full text-center">
                {{ request('filter') === 'city' ? Auth::user()->city . ' Leaderboard' : 'Global Leaderboard' }}
            </h3>
        </div>

        <div class="flex justify-between items-center mb-6 bg-white/50 backdrop-blur-md p-2 rounded-full border border-white/50">
            <a href="{{ route('leaderboard') }}" class="flex-1 py-2 text-center rounded-full font-bold text-sm transition-all {{ request('filter') !== 'city' ? 'bg-emerald-500 text-white shadow-md' : 'text-gray-600 hover:text-emerald-500' }}">Top Savers</a>
            <a href="{{ route('leaderboard', ['filter' => 'city']) }}" class="flex-1 py-2 text-center rounded-full font-bold text-sm transition-all {{ request('filter') === 'city' ? 'bg-emerald-500 text-white shadow-md' : 'text-gray-600 hover:text-emerald-500' }}">My City</a>
        </div>

        <div class="space-y-4 pb-12">
            @forelse($leaderboard as $index => $leader)
                <div class="relative p-4 bg-white/70 backdrop-blur-md shadow-sm rounded-2xl border border-white/50 flex items-center gap-4 {{ $index === 0 ? 'ring-2 ring-amber-400' : '' }}">
                    @if($index === 0)
                        <div class="absolute -top-3 -right-3 text-3xl">👑</div>
                    @endif
                    
                    <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold {{ $index === 0 ? 'bg-amber-400 text-white' : ($index === 1 ? 'bg-gray-300 text-gray-800' : ($index === 2 ? 'bg-amber-600 text-white' : 'bg-gray-100 text-gray-500')) }}">
                        #{{ $index + 1 }}
                    </div>

                    <div class="flex-1">
                        <h4 class="font-bold text-gray-800 text-lg leading-tight">{{ $leader->name }}</h4>
                        <p class="text-xs text-gray-500 font-medium">{{ $leader->profession ?? 'Eco Warrior' }} • {{ $leader->city ?? 'Earth' }}</p>
                    </div>

                    <div class="flex flex-col items-end">
                        <span class="text-xl font-extrabold text-emerald-600">{{ $leader->trees_debt }}</span>
                        <span class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Trees Debt</span>
                    </div>
                </div>
            @empty
                <div class="text-center py-10">
                    <p class="text-gray-500 font-medium">No footprint data recorded yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
