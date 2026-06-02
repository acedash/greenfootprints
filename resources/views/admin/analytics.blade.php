<x-admin-layout>
    <div class="mb-10">
        <h3 class="font-extrabold text-slate-900 text-3xl tracking-tight mb-2">Ecological Debt Analytics</h3>
        <p class="text-slate-500 font-medium">Visualize tracking trends and transport mode distribution.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        
        <!-- Main Line Chart -->
        <div class="lg:col-span-2 bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 p-8">
            <div class="flex justify-between items-center mb-6">
                <h4 class="text-lg font-bold text-slate-800">Carbon & Plastic Debt (Last 30 Days)</h4>
            </div>
            <div class="h-80 w-full relative">
                <canvas id="trendChart"></canvas>
            </div>
        </div>

        <!-- Doughnut Chart -->
        <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 p-8">
            <div class="flex justify-between items-center mb-6">
                <h4 class="text-lg font-bold text-slate-800">Transport Breakdown</h4>
            </div>
            <div class="h-64 w-full relative flex justify-center">
                <canvas id="transportChart"></canvas>
            </div>
            
            <div class="mt-6 space-y-3">
                @foreach($transportStats as $stat)
                <div class="flex items-center justify-between text-sm">
                    <span class="font-bold text-slate-600 capitalize">{{ $stat->transport_mode }}</span>
                    <span class="font-black text-slate-800">{{ $stat->count }} uses</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Script for Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const labels = {!! json_encode($labels) !!};
            const carbonData = {!! json_encode($carbonData) !!};
            const plasticData = {!! json_encode($plasticData) !!};
            
            // Trend Chart
            const ctxTrend = document.getElementById('trendChart').getContext('2d');
            new Chart(ctxTrend, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Carbon Debt (kg)',
                            data: carbonData,
                            borderColor: '#10b981', // Emerald 500
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            borderWidth: 3,
                            tension: 0.4,
                            fill: true,
                            pointBackgroundColor: '#fff',
                            pointBorderColor: '#10b981',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        },
                        {
                            label: 'Plastic Waste (kg)',
                            data: plasticData,
                            borderColor: '#f59e0b', // Amber 500
                            backgroundColor: 'rgba(245, 158, 11, 0.1)',
                            borderWidth: 3,
                            tension: 0.4,
                            fill: true,
                            pointBackgroundColor: '#fff',
                            pointBorderColor: '#f59e0b',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                usePointStyle: true,
                                padding: 20,
                                font: {
                                    family: "'Inter', sans-serif",
                                    weight: 'bold'
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#f1f5f9',
                                drawBorder: false,
                            },
                            ticks: {
                                font: {
                                    family: "'Inter', sans-serif"
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false,
                            },
                            ticks: {
                                font: {
                                    family: "'Inter', sans-serif"
                                }
                            }
                        }
                    }
                }
            });

            // Transport Chart
            const transportStats = {!! json_encode($transportStats) !!};
            const tLabels = transportStats.map(s => s.transport_mode.charAt(0).toUpperCase() + s.transport_mode.slice(1));
            const tData = transportStats.map(s => s.count);
            
            const ctxTransport = document.getElementById('transportChart').getContext('2d');
            new Chart(ctxTransport, {
                type: 'doughnut',
                data: {
                    labels: tLabels,
                    datasets: [{
                        data: tData,
                        backgroundColor: [
                            '#6366f1', // Indigo 500
                            '#10b981', // Emerald 500
                            '#3b82f6', // Blue 500
                            '#f59e0b', // Amber 500
                            '#ec4899', // Pink 500
                            '#8b5cf6'  // Purple 500
                        ],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
    </script>
</x-admin-layout>
