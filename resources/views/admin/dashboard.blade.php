<x-admin-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <!-- Vision & Mission Card -->
        <a href="{{ route('admin.vision-mission.index') }}" class="block p-6 bg-elegant-charcoal border border-white/5 rounded-sm hover:border-elegant-red/50 transition duration-300 group">
            <div class="text-white">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-serif italic">{{ __('Vision & Mission') }}</h3>
                    <i class="fa-solid fa-bullseye text-gray-600 group-hover:text-elegant-gold transition text-xl"></i>
                </div>
                <p class="text-xs text-gray-500 uppercase tracking-widest">{{ __('Manage statements') }}</p>
            </div>
        </a>

        <!-- Albums Card -->
        <a href="{{ route('admin.albums.index') }}" class="block p-6 bg-elegant-charcoal border border-white/5 rounded-sm hover:border-elegant-red/50 transition duration-300 group">
            <div class="text-white">
                 <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-serif italic">{{ __('Gallery Albums') }}</h3>
                    <i class="fa-solid fa-images text-gray-600 group-hover:text-elegant-gold transition text-xl"></i>
                </div>
                <p class="text-xs text-gray-500 uppercase tracking-widest">{{ __('Manage photos') }}</p>
            </div>
        </a>

        <!-- Achievements Card -->
        <a href="{{ route('admin.achievements.index') }}" class="block p-6 bg-elegant-charcoal border border-white/5 rounded-sm hover:border-elegant-red/50 transition duration-300 group">
            <div class="text-white">
                 <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-serif italic">{{ __('Achievements') }}</h3>
                    <i class="fa-solid fa-trophy text-gray-600 group-hover:text-elegant-gold transition text-xl"></i>
                </div>
                <p class="text-xs text-gray-500 uppercase tracking-widest">{{ __('Update showcases') }}</p>
            </div>
        </a>

        <!-- Team Card -->
        <a href="{{ route('admin.team.index') }}" class="block p-6 bg-elegant-charcoal border border-white/5 rounded-sm hover:border-elegant-red/50 transition duration-300 group">
             <div class="text-white">
                 <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-serif italic">{{ __('Team Members') }}</h3>
                    <i class="fa-solid fa-users text-gray-600 group-hover:text-elegant-gold transition text-xl"></i>
                </div>
                <p class="text-xs text-gray-500 uppercase tracking-widest">{{ __('Manage profiles') }}</p>
            </div>
        </a>

        <!-- Site Content Card -->
        <a href="{{ route('admin.site-content.index') }}" class="block p-6 bg-elegant-charcoal border border-white/5 rounded-sm hover:border-elegant-red/50 transition duration-300 group">
            <div class="text-white">
                 <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-serif italic">{{ __('Site Content') }}</h3>
                    <i class="fa-solid fa-pen-to-square text-gray-600 group-hover:text-elegant-gold transition text-xl"></i>
                </div>
                <p class="text-xs text-gray-500 uppercase tracking-widest">{{ __('Hero & About') }}</p>
            </div>
        </a>

    </div>
</x-admin-layout>
