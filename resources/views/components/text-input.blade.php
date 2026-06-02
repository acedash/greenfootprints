@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full p-3 rounded-xl border border-emerald-500/20 bg-white/80 text-gray-800 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all text-sm shadow-sm']) }}>
