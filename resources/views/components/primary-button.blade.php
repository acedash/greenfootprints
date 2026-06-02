<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full py-4 px-6 bg-gradient-to-r from-emerald-500 to-emerald-700 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-wider hover:from-emerald-600 hover:to-emerald-800 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5']) }}>
    {{ $slot }}
</button>
