<x-admin-layout>
    <div class="mb-10 flex justify-between items-end">
        <div>
            <h3 class="font-extrabold text-slate-900 text-3xl tracking-tight mb-2">All Users</h3>
            <p class="text-slate-500 font-medium">Manage and view all registered users across the platform.</p>
        </div>
        <div class="bg-emerald-50 text-emerald-600 px-4 py-2 rounded-xl font-bold text-sm border border-emerald-100 shadow-sm">
            Total: {{ $users->total() }}
        </div>
    </div>

    <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden mb-8">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100 text-xs uppercase tracking-widest text-slate-400 font-bold">
                        <th class="px-8 py-5">User</th>
                        <th class="px-8 py-5">Location / Profession</th>
                        <th class="px-8 py-5">Carbon Tracked</th>
                        <th class="px-8 py-5">Trees Debt</th>
                        <th class="px-8 py-5">Joined</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($users as $user)
                    <tr class="hover:bg-slate-50 transition-colors group">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-indigo-50 text-indigo-600 flex justify-center items-center font-bold text-sm shadow-sm border border-indigo-100 shrink-0">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <div>
                                    <span class="font-bold text-slate-800 block">{{ $user->name }}</span>
                                    <span class="text-xs text-slate-500">{{ $user->email ?? $user->phone_number }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <span class="font-bold text-slate-700 block">{{ $user->city ?? 'Not specified' }}</span>
                            <span class="text-xs text-slate-500">{{ $user->profession ?? 'Not specified' }}</span>
                        </td>
                        <td class="px-8 py-5">
                            <span class="font-black text-slate-800 text-lg">{{ number_format($user->total_carbon, 1) }}</span>
                            <span class="text-xs text-slate-400 font-bold ml-1">KG</span>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-2">
                                <span class="font-black text-emerald-600 text-lg">{{ ceil($user->total_carbon / 21) }}</span>
                                <span class="text-lg">🌳</span>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-sm font-medium text-slate-500">
                            {{ $user->created_at->format('M d, Y') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-16 text-center text-slate-400 font-medium">
                            No users found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($users->hasPages())
        <div class="px-8 py-5 border-t border-slate-100 bg-slate-50/30">
            {{ $users->links() }}
        </div>
        @endif
    </div>
</x-admin-layout>
