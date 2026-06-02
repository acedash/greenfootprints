<x-app-layout>
    <div class="px-6 py-4">
        <div class="flex items-center gap-4 mb-8">
            <h3 class="font-bold text-gray-800 text-2xl w-full text-center">My Impact History</h3>
        </div>

        @if($records->count() > 0)
            <div class="bg-white/60 backdrop-blur-xl rounded-[2rem] p-6 border border-white/50 shadow-[0_8px_32px_0_rgba(31,38,135,0.05)] mb-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-300 rounded-full mix-blend-multiply filter blur-[50px] opacity-20"></div>
                <h4 class="text-xs font-extrabold text-gray-500 uppercase tracking-wider mb-6">Carbon Trend (Last {{ $records->count() }} entries)</h4>
                <div class="w-full h-56 relative z-10">
                    <canvas id="historyChart"></canvas>
                </div>
            </div>

            <h4 class="text-xs font-extrabold text-gray-500 uppercase tracking-wider mb-4 px-2">Recent Records</h4>
            <div class="space-y-4 mb-12">
                @foreach($records->reverse() as $record)
                <div class="p-5 bg-white/70 backdrop-blur-md shadow-sm rounded-2xl border border-white/50 flex justify-between items-center transition-all hover:scale-[1.02] hover:shadow-md cursor-pointer">
                    <div class="flex gap-4 items-center">
                        <div class="w-12 h-12 rounded-full bg-emerald-50 flex justify-center items-center text-emerald-500 shadow-inner">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <p class="text-base font-extrabold text-gray-800 leading-tight mb-1">{{ $record->created_at->format('M d, Y') }}</p>
                            <p class="text-xs text-gray-500 font-semibold flex items-center gap-2">
                                <span>{{ number_format($record->carbon_kg, 1) }}kg CO₂</span>
                                <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                                <span>{{ $record->plastic_items }} plastics</span>
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col items-end">
                        <span class="text-2xl font-black text-emerald-600 leading-none">{{ $record->trees_debt }}</span>
                        <span class="text-[10px] uppercase font-bold text-emerald-400 mt-1">Trees</span>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-10">
                <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">🌱</div>
                <h3 class="font-bold text-gray-800 text-lg mb-2">No History Yet</h3>
                <p class="text-sm text-gray-500 mb-6">Calculate and save your footprint to track your progress over time.</p>
                <a href="{{ route('dashboard') }}" class="py-3 px-6 bg-emerald-500 rounded-full font-bold text-white shadow-lg">Go to Calculator</a>
            </div>
        @endif
    </div>

    @if($records->count() > 0)
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const records = @json($records);
            
            const labels = records.map(r => new Date(r.created_at).toLocaleDateString(undefined, {month: 'short', day: 'numeric'}));
            const data = records.map(r => r.carbon_kg);

            const ctx = document.getElementById('historyChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Carbon Debt (kg)',
                        data: data,
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: { beginAtZero: true, grid: { display: false } },
                        x: { grid: { display: false } }
                    }
                }
            });
        });
    </script>
    @endif
</x-app-layout>
