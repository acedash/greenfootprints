<x-app-layout>
    <div class="px-6 py-4 pb-24 h-full overflow-y-auto">
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('dashboard') }}" class="w-10 h-10 rounded-full bg-white/70 backdrop-blur-md flex justify-center items-center text-emerald-600 border border-white/50 shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h3 class="font-bold text-gray-800 text-2xl">My Profile</h3>
        </div>

        <div class="space-y-6">
            <div class="p-6 bg-white/70 backdrop-blur-xl shadow-sm rounded-3xl border border-white/50">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="p-6 bg-white/70 backdrop-blur-xl shadow-sm rounded-3xl border border-white/50">
                @include('profile.partials.update-password-form')
            </div>

            <div class="p-6 bg-white/70 backdrop-blur-xl shadow-sm rounded-3xl border border-white/50">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
