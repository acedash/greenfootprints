<x-app-layout>
    <div class="px-6 py-4 pb-24 h-full overflow-y-auto">
        <div class="flex items-center gap-4 mb-8">
            <h3 class="font-bold text-gray-800 text-2xl w-full text-center">Admin Overview</h3>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-8">
            <div class="bg-indigo-500/90 backdrop-blur-md rounded-2xl p-4 shadow-lg text-white">
                <p class="text-indigo-100 text-sm font-bold mb-1">Total Users</p>
                <p class="text-3xl font-black">{{ number_format($totalUsers) }}</p>
            </div>
            
            <div class="bg-emerald-500/90 backdrop-blur-md rounded-2xl p-4 shadow-lg text-white">
                <p class="text-emerald-100 text-sm font-bold mb-1">Carbon Tracked</p>
                <p class="text-3xl font-black">{{ number_format($totalCarbon, 1) }}<span class="text-sm font-bold ml-1">kg</span></p>
            </div>
        </div>

        <div class="bg-white/70 backdrop-blur-xl rounded-[2rem] p-6 border border-white/50 shadow-sm mb-8">
            <h4 class="text-sm font-extrabold text-gray-800 uppercase tracking-wider mb-6">City Statistics ({{ $activeCities }} Active)</h4>
            
            <div class="space-y-4">
                @foreach($cityStats as $index => $stat)
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-indigo-50 text-indigo-500 flex justify-center items-center font-bold text-xs">
                            {{ $index + 1 }}
                        </div>
                        <span class="font-bold text-gray-700">{{ $stat->city ?? 'Unknown' }}</span>
                    </div>
                    <span class="font-extrabold text-indigo-600">{{ $stat->count }} Users</span>
                </div>
                @endforeach
            </div>
        </div>
        
        <div class="text-center">
            <a href="{{ route('dashboard') }}" class="text-emerald-600 font-bold hover:underline">Return to User App</a>
        </div>
    </div>
</x-app-layout>
