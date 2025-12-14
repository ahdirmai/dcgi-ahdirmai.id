<x-admin-layout>
    <x-slot name="header">
        {{ __('Edit Album') }}
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-elegant-charcoal shadow-lg sm:rounded-sm border border-white/5">
        <h3 class="text-lg font-medium text-white font-serif italic mb-6 border-b border-white/10 pb-2">{{ __('Edit Album Details') }}</h3>

        <form action="{{ route('admin.albums.update', $album->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <x-input-label for="title" :value="__('Title')" class="text-gray-400" />
                <x-text-input id="title" name="title" type="text" 
                    class="mt-1 block w-full bg-black/20 border-white/10 text-gray-300 focus:border-elegant-gold focus:ring-elegant-gold rounded-sm" 
                    :value="old('title', $album->title)" required autofocus />
                <x-input-error class="mt-2 text-red-400" :messages="$errors->get('title')" />
            </div>

            <!-- Description -->
            <div>
                <x-input-label for="description" :value="__('Description')" class="text-gray-400" />
                <textarea id="description" name="description" 
                    class="mt-1 block w-full bg-black/20 border-white/10 text-gray-300 focus:border-elegant-gold focus:ring-elegant-gold rounded-sm shadow-sm" 
                    rows="3">{{ old('description', $album->description) }}</textarea>
                <x-input-error class="mt-2 text-red-400" :messages="$errors->get('description')" />
            </div>

            <!-- Cover Image -->
            <div>
                <x-input-label for="cover_image" :value="__('Cover Image')" class="text-gray-400" />
                 @if($album->cover_image_path)
                    <div class="mb-2 p-2 border border-white/10 bg-black/20 inline-block rounded-sm">
                        <img src="{{ $album->cover_image_path }}" alt="Current Cover" class="h-20 w-20 object-cover rounded-sm">
                    </div>
                @endif
                <input id="cover_image" name="cover_image" type="file" 
                    class="mt-1 block w-full text-sm text-gray-400 border border-white/10 rounded-sm cursor-pointer bg-black/20 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-xs file:font-semibold file:bg-elegant-gold file:text-black hover:file:bg-yellow-600" 
                    accept="image/*">
                <p class="mt-1 text-xs text-gray-500">Leave blank to keep current cover.</p>
                <x-input-error class="mt-2 text-red-400" :messages="$errors->get('cover_image')" />
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-white/10">
                <button type="submit" class="bg-elegant-gold text-black hover:bg-yellow-600 font-bold py-2 px-6 rounded-sm transition text-sm uppercase tracking-wider">
                    {{ __('Update Album') }}
                </button>
                <a href="{{ route('admin.albums.index') }}" class="text-gray-500 hover:text-white transition text-sm">Cancel</a>
            </div>
        </form>

    </div>
</x-admin-layout>
