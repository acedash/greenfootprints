<x-app-layout>
    <div x-data="{ showSplash: true }" x-init="setTimeout(() => showSplash = false, 2000)" class="h-full relative w-full overflow-y-auto">
        <!-- Splash Screen -->
        <div x-show="showSplash" x-transition.opacity.duration.800ms class="absolute inset-0 z-50 flex flex-col items-center justify-center bg-white/60 backdrop-blur-3xl">
            <div class="w-32 h-32 rounded-[2rem] overflow-hidden flex items-center justify-center mb-8 shadow-2xl shadow-emerald-500/40 animate-pulse transition-transform hover:scale-110 duration-500 border border-white/50">
                <img src="{{ asset('logo.jpeg') }}" alt="Green Footprints Logo" class="w-full h-full object-cover">
            </div>
            <h1 class="text-4xl font-black text-gray-800 tracking-tight text-center">Green<br><span class="text-emerald-500">Footprints</span></h1>
            <p class="text-gray-500 font-bold mt-4 tracking-widest uppercase text-sm">The Sprouting Step</p>
        </div>

        <!-- Main Content -->
        <div x-show="!showSplash" x-transition.opacity.duration.800ms style="display: none;" class="px-6 py-4 pb-32">
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full overflow-hidden bg-white/70 backdrop-blur-md border border-white/50 p-1 flex justify-center items-center shadow-sm">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=10b981&color=fff" alt="Avatar" class="rounded-full w-full h-full object-cover">
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-900 leading-tight">{{ Auth::user()->name }}</h2>
                    <p class="text-xs text-gray-500 font-medium">{{ Auth::user()->email ?? Auth::user()->phone_number }}</p>
                </div>
            </div>
            <a href="{{ route('profile.edit') }}" class="text-emerald-500 bg-white/70 backdrop-blur-md p-2 rounded-full border border-white/50 shadow-sm hover:bg-emerald-50 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </a>
        </div>

        <div class="flex items-center gap-2 mb-4">
            <svg class="w-6 h-6 text-gray-700" fill="currentColor" viewBox="0 0 24 24"><path d="M17.5 19c-2.48 0-4.5-2.02-4.5-4.5S15.02 10 17.5 10 22 12.02 22 14.5 19.98 19 17.5 19zm0-7c-1.38 0-2.5 1.12-2.5 2.5s1.12 2.5 2.5 2.5 2.5-1.12 2.5-2.5-1.12-2.5-2.5-2.5zM6.5 19C4.02 19 2 16.98 2 14.5S4.02 10 6.5 10 11 12.02 11 14.5 8.98 19 6.5 19zm0-7C5.12 12 4 13.12 4 14.5S5.12 17 6.5 17 9 15.88 9 14.5 7.88 12 6.5 12zM12 15c-1.65 0-3-1.35-3-3s1.35-3 3-3 3 1.35 3 3-1.35 3-3 3zm0-4c-.55 0-1 .45-1 1s.45 1 1 1 1-.45 1-1-.45-1-1-1zM20 7.23V7c0-2.76-2.24-5-5-5-2.28 0-4.27 1.53-4.85 3.65C9.64 5.23 9.09 5 8.5 5 6.02 5 4 7.02 4 9.5v.19c-1.74.77-3 2.52-3 4.54C1 17.54 3.46 20 6.5 20h11c3.04 0 5.5-2.46 5.5-5.5 0-2.31-1.46-4.3-3.5-5.06zM17.5 18h-11C4.57 18 3 16.43 3 14.5S4.57 11 6.5 11c.21 0 .42.02.62.06l.57.11.16-.56c.4-1.39 1.69-2.41 3.2-2.41 1.25 0 2.37.7 2.91 1.83l.23.47.51-.11c.42-.09.85-.14 1.3-.14 2.21 0 4 1.79 4 4 0 .32-.04.64-.11.95l-.18.82.78.29c1.23.46 2.01 1.63 2.01 2.95 0 1.65-1.35 3-3 3z"/></svg>
            <h3 class="font-bold text-gray-800 text-lg">Calculate Footprint</h3>
        </div>

        <div class="grid grid-cols-2 gap-3 mb-4">
            <div class="bg-white/70 backdrop-blur-md rounded-2xl p-4 border border-white/50 shadow-sm flex flex-col justify-between">
                <span class="text-xs font-semibold text-gray-600 mb-2">Plastic Items / Day</span>
                <input type="range" id="plasticSlider" min="0" max="20" value="3" class="w-full h-1 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-emerald-500 mb-2">
                <div class="flex justify-between items-center">
                    <span class="text-xl font-extrabold text-emerald-600" id="plasticVal">3</span>
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
            </div>

            <div class="bg-white/70 backdrop-blur-md rounded-2xl p-4 border border-white/50 shadow-sm flex flex-col justify-between">
                <span class="text-xs font-semibold text-gray-600 mb-2">Commute (km)</span>
                <input type="range" id="commuteSlider" min="0" max="100" value="15" class="w-full h-1 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-emerald-500 mb-2">
                <div class="flex justify-between items-center">
                    <span class="text-xl font-extrabold text-emerald-600" id="commuteVal">15</span>
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                </div>
            </div>
        </div>

        <div class="bg-white/70 backdrop-blur-md rounded-2xl p-4 border border-white/50 shadow-sm mb-4">
            <select id="transportMode" class="w-full bg-transparent border-none text-sm font-semibold text-gray-800 focus:ring-0 p-0 cursor-pointer outline-none">
                <option value="0.192">🚗 Petrol/Diesel Car</option>
                <option value="0.105">🚌 Public Bus</option>
                <option value="0.060">🏍️ Two-Wheeler (Motorcycle/Scooter)</option>
                <option value="0.040">⚡ Electric Vehicle (Car)</option>
                <option value="0">🚶 Walking / Cycling</option>
            </select>
        </div>

        <label class="flex items-center justify-between p-4 bg-white/70 backdrop-blur-md shadow-sm rounded-2xl cursor-pointer border border-white/50 mb-8">
            <span class="text-sm font-semibold text-gray-800">I strictly segregate my waste at the source.</span>
            <input type="checkbox" id="segregationToggle" class="w-5 h-5 text-emerald-500 rounded focus:ring-emerald-500 border-gray-300 bg-white/50">
        </label>

        <!-- Chart Section -->
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-bold text-gray-800 text-lg">Ecological Debt</h3>
            <span class="text-xs font-semibold text-white bg-gray-800 px-3 py-1 rounded-full">Annual</span>
        </div>
        
        <div class="bg-white/70 backdrop-blur-md rounded-2xl p-4 border border-white/50 shadow-sm flex items-center gap-4 mb-8">
            <div class="w-32 h-32 relative">
                <canvas id="footprintChart"></canvas>
            </div>
            <div class="flex-1 space-y-3">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                        <span class="text-xs text-gray-600 font-medium">Transport</span>
                    </div>
                    <span class="text-sm font-bold text-gray-800" id="carbonStat">0kg</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                        <span class="text-xs text-gray-600 font-medium">Plastic</span>
                    </div>
                    <span class="text-sm font-bold text-gray-800" id="plasticStat">0kg</span>
                </div>
                <div class="flex justify-between items-center mt-2 pt-2 border-t border-gray-200/50">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-green-700"></div>
                        <span class="text-xs text-gray-600 font-medium">Trees Debt</span>
                    </div>
                    <span class="text-sm font-bold text-gray-800"><span id="treeStat">0</span></span>
                </div>
            </div>
        </div>

        <!-- Save Footprint Action -->
        <button id="saveFootprintBtn" class="w-full py-4 mb-8 bg-emerald-100/50 backdrop-blur-md border border-emerald-300 rounded-xl font-bold text-emerald-800 shadow-sm hover:bg-emerald-200/50 transition-all flex justify-center items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
            Save Today's Footprint
        </button>

        <!-- Zero-Waste Pledges -->
        <h3 class="font-bold text-gray-800 text-lg mb-4">Zero-Waste Pledges</h3>
        <div class="space-y-3 mb-8">
            <label class="flex items-center gap-4 p-4 bg-white/70 backdrop-blur-md shadow-sm rounded-2xl cursor-pointer border border-white/50">
                <input type="checkbox" class="w-5 h-5 text-emerald-500 rounded focus:ring-0 border-gray-300 bg-white/50">
                <span class="text-sm font-medium text-gray-700">Carry a reusable cloth bag</span>
            </label>
            
            <label class="flex items-center gap-4 p-4 bg-white/70 backdrop-blur-md shadow-sm rounded-2xl cursor-pointer border border-white/50">
                <input type="checkbox" class="w-5 h-5 text-emerald-500 rounded focus:ring-0 border-gray-300 bg-white/50">
                <span class="text-sm font-medium text-gray-700">Use a refillable water bottle</span>
            </label>
        </div>

        <!-- Social Impact Sharing -->
        <button id="shareButton" class="w-full py-4 mb-6 bg-emerald-500/90 backdrop-blur-md border border-emerald-400/50 rounded-xl font-bold text-white shadow-lg shadow-emerald-500/20 hover:bg-emerald-600 transition-all flex justify-center items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
            Share My Footprint
        </button>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const plasticSlider = document.getElementById('plasticSlider');
            const plasticVal = document.getElementById('plasticVal');
            const commuteSlider = document.getElementById('commuteSlider');
            const commuteVal = document.getElementById('commuteVal');
            const transportMode = document.getElementById('transportMode');
            const segregationToggle = document.getElementById('segregationToggle');
            
            const carbonStat = document.getElementById('carbonStat');
            const plasticStat = document.getElementById('plasticStat');
            const treeStat = document.getElementById('treeStat');

            const PLASTIC_WEIGHT_KG = 0.015;
            const DAYS_IN_YEAR = 365;
            const CO2_PER_TREE_KG = 22;
            
            let currentData = {};

            // Initialize Chart
            const ctx = document.getElementById('footprintChart').getContext('2d');
            const footprintChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Transport', 'Plastic'],
                    datasets: [{
                        data: [50, 50],
                        backgroundColor: ['#10b981', '#fbbf24'],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    cutout: '70%',
                    plugins: {
                        legend: { display: false },
                        tooltip: { enabled: false }
                    }
                }
            });

            function calculateImpact() {
                // Plastic
                let dailyPlasticItems = parseInt(plasticSlider.value);
                let annualPlasticKg = dailyPlasticItems * PLASTIC_WEIGHT_KG * DAYS_IN_YEAR;
                if(segregationToggle.checked) {
                    annualPlasticKg = annualPlasticKg * 0.6;
                }
                
                // Carbon
                let dailyCommuteKm = parseInt(commuteSlider.value);
                let emissionFactor = parseFloat(transportMode.value);
                let annualCarbonKg = dailyCommuteKm * emissionFactor * DAYS_IN_YEAR;

                // Trees
                let treesNeeded = annualCarbonKg / CO2_PER_TREE_KG;

                // Update UI Texts
                plasticVal.innerText = dailyPlasticItems;
                commuteVal.innerText = dailyCommuteKm;
                
                carbonStat.innerText = annualCarbonKg.toFixed(1) + 'kg';
                plasticStat.innerText = annualPlasticKg.toFixed(1) + 'kg';
                treeStat.innerText = Math.ceil(treesNeeded) + ' 🌳';

                // Save to currentData for AJAX
                currentData = {
                    plastic_items: dailyPlasticItems,
                    commute_km: dailyCommuteKm,
                    transport_mode_factor: emissionFactor,
                    is_segregating: segregationToggle.checked ? 1 : 0,
                    carbon_kg: annualCarbonKg,
                    plastic_kg: annualPlasticKg,
                    trees_debt: Math.ceil(treesNeeded)
                };

                // Update Chart
                if(annualCarbonKg === 0 && annualPlasticKg === 0) {
                    footprintChart.data.datasets[0].data = [1, 1]; // Prevent empty chart
                    footprintChart.data.datasets[0].backgroundColor = ['#e5e7eb', '#e5e7eb'];
                } else {
                    footprintChart.data.datasets[0].data = [annualCarbonKg, annualPlasticKg];
                    footprintChart.data.datasets[0].backgroundColor = ['#10b981', '#fbbf24'];
                }
                footprintChart.update();
            }

            // Event Listeners
            plasticSlider.addEventListener('input', calculateImpact);
            commuteSlider.addEventListener('input', calculateImpact);
            transportMode.addEventListener('change', calculateImpact);
            segregationToggle.addEventListener('change', calculateImpact);

            // Initial Calculation
            calculateImpact();

            // Save Footprint AJAX
            document.getElementById('saveFootprintBtn').addEventListener('click', function() {
                const btn = this;
                const originalText = btn.innerHTML;
                btn.innerHTML = 'Saving...';
                btn.disabled = true;

                fetch('{{ route('footprint.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(currentData)
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        btn.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg> Saved Successfully!';
                        btn.classList.add('bg-emerald-200');
                        setTimeout(() => {
                            btn.innerHTML = originalText;
                            btn.classList.remove('bg-emerald-200');
                            btn.disabled = false;
                        }, 3000);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    btn.innerHTML = 'Error Saving';
                    setTimeout(() => {
                        btn.innerHTML = originalText;
                        btn.disabled = false;
                    }, 3000);
                });
            });
        });
    </script>
    </div>
    </div>
</x-app-layout>
