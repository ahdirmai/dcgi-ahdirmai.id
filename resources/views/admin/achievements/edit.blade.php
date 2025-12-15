<x-admin-layout>
    <x-slot name="header">
        {{ __('Edit Achievement') }}
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-elegant-charcoal shadow-lg sm:rounded-sm border border-white/5">
        <h3 class="text-lg font-medium text-white font-serif italic mb-6 border-b border-white/10 pb-2">{{ __('Edit Achievement Details') }}</h3>

        <form action="{{ route('admin.achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Year -->
                <div>
                    <x-input-label for="year" :value="__('Year')" class="text-gray-400" />
                    <x-text-input id="year" name="year" type="number" 
                        class="mt-1 block w-full bg-black/20 border-white/10 text-gray-300 focus:border-elegant-gold focus:ring-elegant-gold rounded-sm" 
                        :value="old('year', $achievement->year)" required />
                    <x-input-error class="mt-2 text-red-400" :messages="$errors->get('year')" />
                </div>

                <!-- Title -->
                <div>
                    <x-input-label for="title" :value="__('Title')" class="text-gray-400" />
                    <x-text-input id="title" name="title" type="text" 
                        class="mt-1 block w-full bg-black/20 border-white/10 text-gray-300 focus:border-elegant-gold focus:ring-elegant-gold rounded-sm" 
                        :value="old('title', $achievement->title)" required />
                    <x-input-error class="mt-2 text-red-400" :messages="$errors->get('title')" />
                </div>
            </div>

            <!-- Description -->
            <div>
                <x-input-label for="description" :value="__('Description / Category')" class="text-gray-400" />
                <x-text-input id="description" name="description" type="text" 
                    class="mt-1 block w-full bg-black/20 border-white/10 text-gray-300 focus:border-elegant-gold focus:ring-elegant-gold rounded-sm" 
                    :value="old('description', $achievement->description)" />
                <x-input-error class="mt-2 text-red-400" :messages="$errors->get('description')" />
            </div>

            <!-- Long Description -->
            <div>
                <x-input-label for="long_description" :value="__('Long Description')" class="text-gray-400" />
                <textarea id="long_description" name="long_description" 
                    class="mt-1 block w-full bg-black/20 border-white/10 text-gray-300 focus:border-elegant-gold focus:ring-elegant-gold rounded-sm h-32"
                    >{{ old('long_description', $achievement->long_description) }}</textarea>
                <x-input-error class="mt-2 text-red-400" :messages="$errors->get('long_description')" />
            </div>

            <!-- Current Images -->
            <div class="border-t border-white/10 pt-4">
                <h3 class="text-sm font-medium text-gray-400 mb-4">{{ __('Current Images') }}</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                    @foreach($achievement->galleries as $gallery)
                        <div class="relative group border border-white/10 rounded-sm overflow-hidden">
                            <img src="{{ $gallery->image_path }}" class="h-24 w-full object-cover opacity-80 group-hover:opacity-100 transition">
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- New Images -->
            <div>
                <x-input-label for="images" :value="__('Add More Images')" class="text-gray-400" />
                <input id="images" name="images[]" type="file" multiple 
                    class="mt-1 block w-full text-sm text-gray-400 border border-white/10 rounded-sm cursor-pointer bg-black/20 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-xs file:font-semibold file:bg-elegant-gold file:text-black hover:file:bg-yellow-600" 
                    accept="image/*">
                <x-input-error class="mt-2 text-red-400" :messages="$errors->get('images')" />
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-white/10">
                <button type="submit" class="bg-elegant-gold text-black hover:bg-yellow-600 font-bold py-2 px-6 rounded-sm transition text-sm uppercase tracking-wider">
                    {{ __('Update Achievement') }}
                </button>
                <a href="{{ route('admin.achievements.index') }}" class="text-gray-500 hover:text-white transition text-sm">Cancel</a>
            </div>
        </form>

    </div>
</x-admin-layout>
