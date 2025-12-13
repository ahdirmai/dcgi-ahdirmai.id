<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Achievement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form action="{{ route('admin.achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="year" :value="__('Year')" />
                                <x-text-input id="year" name="year" type="number" class="mt-1 block w-full" :value="old('year', $achievement->year)" required />
                                <x-input-error class="mt-2" :messages="$errors->get('year')" />
                            </div>

                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $achievement->title)" required />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description / Category')" />
                            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $achievement->description)" />
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                            <h3 class="text-lg font-medium mb-4">{{ __('Current Images') }}</h3>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                                @foreach($achievement->galleries as $gallery)
                                    <div class="relative group">
                                        <img src="{{ $gallery->image_path }}" class="h-24 w-full object-cover rounded">
                                        <!-- Note: Deleting individual images requires a separate route generally. Skipping for simplicity unless requested. -->
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <x-input-label for="images" :value="__('Add More Images')" />
                            <input id="images" name="images[]" type="file" multiple class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" accept="image/*">
                            <x-input-error class="mt-2" :messages="$errors->get('images')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update Achievement') }}</x-primary-button>
                            <a href="{{ route('admin.achievements.index') }}" class="text-gray-600 dark:text-gray-400 hover:underline">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
