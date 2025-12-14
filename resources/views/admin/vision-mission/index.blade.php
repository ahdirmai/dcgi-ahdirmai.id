<x-admin-layout>
    <x-slot name="header">
        {{ __('Vision & Mission') }}
    </x-slot>

    <div class="space-y-6">
        
        <!-- Vision Section -->
        <div class="p-4 sm:p-8 bg-elegant-charcoal shadow-lg sm:rounded-sm border border-white/5">
            <section>
                <header>
                    <h2 class="text-lg font-medium text-white font-serif italic">
                        {{ __('Vision') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-400">
                        {{ __("Update the organization's vision statement.") }}
                    </p>
                </header>

                @if($vision)
                    <form method="post" action="{{ route('admin.vision-mission.update', $vision->id ?? 0) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')
                        <input type="hidden" name="type" value="vision">

                        <div>
                            <x-input-label for="vision_content" :value="__('Content')" class="text-gray-300" />
                            <x-text-input id="vision_content" name="content" type="text" class="mt-1 block w-full bg-black/20 text-white border-white/10 focus:border-elegant-gold focus:ring-elegant-gold" :value="old('content', $vision->content)" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button class="bg-elegant-red hover:bg-red-800 border-none">{{ __('Save') }}</x-primary-button>

                            @if (session('success'))
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-green-400"
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
        <div class="p-4 sm:p-8 bg-elegant-charcoal shadow-lg sm:rounded-sm border border-white/5">
            <section>
                <header>
                    <h2 class="text-lg font-medium text-white font-serif italic">
                        {{ __('Missions') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-400">
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
                                <x-text-input name="content" type="text" class="block w-full bg-black/20 text-white border-white/10 focus:border-elegant-gold focus:ring-elegant-gold" :value="$mission->content" required />
                                <x-primary-button class="bg-gray-700 hover:bg-gray-600 border-none">{{ __('Update') }}</x-primary-button>
                            </form>
                            <form method="post" action="{{ route('admin.vision-mission.destroy', $mission->id) }}">
                                @csrf
                                @method('delete')
                                <x-danger-button class="bg-red-900/50 text-red-200 hover:bg-red-900 border border-red-900" onclick="return confirm('Are you sure?')">{{ __('Delete') }}</x-danger-button>
                            </form>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 border-t border-white/10 pt-6">
                    <h3 class="text-md font-medium text-gray-300 mb-4">{{ __('Add New Mission') }}</h3>
                        <form method="post" action="{{ route('admin.vision-mission.store') }}" class="flex gap-2">
                        @csrf
                        <input type="hidden" name="type" value="mission">
                        <x-text-input name="content" type="text" class="block w-full bg-black/20 text-white border-white/10 focus:border-elegant-gold focus:ring-elegant-gold" placeholder="Enter new mission point..." required />
                        <x-primary-button class="bg-elegant-gold hover:bg-yellow-600 text-black border-none">{{ __('Add') }}</x-primary-button>
                    </form>
                </div>

            </section>
        </div>

    </div>
</x-admin-layout>
