<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Vision & Mission Card -->
                <a href="{{ route('admin.vision-mission.index') }}" class="block p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition">
                    <div class="text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">{{ __('Vision & Mission') }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Manage organization vision and mission statements.') }}</p>
                    </div>
                </a>

                <!-- Albums Card -->
                <a href="{{ route('admin.albums.index') }}" class="block p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition">
                    <div class="text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">{{ __('Gallery Albums') }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Manage photo albums for the gallery.') }}</p>
                    </div>
                </a>

                <!-- Achievements Card -->
                <a href="{{ route('admin.achievements.index') }}" class="block p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition">
                    <div class="text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">{{ __('Achievements') }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Update achievement records and showcase.') }}</p>
                    </div>
                </a>

                <!-- Team Card -->
                <a href="{{ route('admin.team.index') }}" class="block p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition">
                    <div class="text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">{{ __('Team Members') }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Manage leadership and team member profiles.') }}</p>
                    </div>
                </a>

                <!-- Site Content Card -->
                <a href="{{ route('admin.site-content.index') }}" class="block p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition">
                    <div class="text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">{{ __('Site Content') }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Manage homepage hero and about sections.') }}</p>
                    </div>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
