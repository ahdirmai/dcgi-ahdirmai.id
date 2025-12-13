<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vision & Mission') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Vision Section -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Vision') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Update the organization's vision statement.") }}
                        </p>
                    </header>

                    @if($vision)
                        <form method="post" action="{{ route('admin.vision-mission.update', $vision->id ?? 0) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')
                            <input type="hidden" name="type" value="vision">

                            <div>
                                <x-input-label for="vision_content" :value="__('Content')" />
                                <x-text-input id="vision_content" name="content" type="text" class="mt-1 block w-full" :value="old('content', $vision->content)" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('content')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('success'))
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                    >{{ session('success') }}</p>
                                @endif
                            </div>
                        </form>
                    @else
                        <p class="mt-4 text-gray-500">No Vision found. Please seed the database.</p>
                    @endif
                </section>
            </div>

            <!-- Mission Section -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Missions') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Manage the mission points.") }}
                        </p>
                    </header>

                    <div class="mt-6 space-y-4">
                        @foreach($missions as $mission)
                            <div class="flex items-center space-x-4">
                                <form method="post" action="{{ route('admin.vision-mission.update', $mission->id) }}" class="flex-1 flex gap-2">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="type" value="mission">
                                    <x-text-input name="content" type="text" class="block w-full" :value="$mission->content" required />
                                    <x-primary-button>{{ __('Update') }}</x-primary-button>
                                </form>
                                <form method="post" action="{{ route('admin.vision-mission.destroy', $mission->id) }}">
                                    @csrf
                                    @method('delete')
                                    <x-danger-button onclick="return confirm('Are you sure?')">{{ __('Delete') }}</x-danger-button>
                                </form>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6 border-t pt-6">
                        <h3 class="text-md font-medium text-gray-900 dark:text-gray-100 mb-4">{{ __('Add New Mission') }}</h3>
                         <form method="post" action="{{ route('admin.vision-mission.store') }}" class="flex gap-2">
                            @csrf
                            <input type="hidden" name="type" value="mission">
                            <x-text-input name="content" type="text" class="block w-full" placeholder="Enter new mission point..." required />
                            <x-primary-button>{{ __('Add') }}</x-primary-button>
                        </form>
                    </div>

                </section>
            </div>

        </div>
    </div>
</x-app-layout>
