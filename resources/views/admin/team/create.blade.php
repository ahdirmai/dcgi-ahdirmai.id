<x-admin-layout>
    <x-slot name="header">
        {{ __('Add Team Member') }}
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-elegant-charcoal shadow-lg sm:rounded-sm border border-white/5">
        <h3 class="text-lg font-medium text-white font-serif italic mb-6 border-b border-white/10 pb-2">{{ __('New Member Details') }}</h3>
        
        <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-gray-400" />
                    <x-text-input id="name" name="name" type="text" 
                        class="mt-1 block w-full bg-black/20 border-white/10 text-gray-300 focus:border-elegant-gold focus:ring-elegant-gold rounded-sm" 
                        :value="old('name')" required autofocus />
                    <x-input-error class="mt-2 text-red-400" :messages="$errors->get('name')" />
                </div>

                <!-- Role -->
                <div>
                    <x-input-label for="role" :value="__('Role')" class="text-gray-400" />
                    <x-text-input id="role" name="role" type="text" 
                        class="mt-1 block w-full bg-black/20 border-white/10 text-gray-300 focus:border-elegant-gold focus:ring-elegant-gold rounded-sm" 
                        :value="old('role')" required placeholder="e.g. Band Director" />
                    <x-input-error class="mt-2 text-red-400" :messages="$errors->get('role')" />
                </div>

                <!-- Section -->
                <div class="md:col-span-2">
                    <x-input-label for="section" :value="__('Section (Optional)')" class="text-gray-400" />
                    <x-text-input id="section" name="section" type="text" 
                        class="mt-1 block w-full bg-black/20 border-white/10 text-gray-300 focus:border-elegant-gold focus:ring-elegant-gold rounded-sm" 
                        :value="old('section')" placeholder="e.g. Brass, Battery, Color Guard" />
                    <x-input-error class="mt-2 text-red-400" :messages="$errors->get('section')" />
                </div>
            </div>

            <!-- Type -->
            <div>
                <x-input-label for="type" :value="__('Type')" class="text-gray-400" />
                <select id="type" name="type" class="mt-1 block w-full bg-black/20 border-white/10 text-gray-300 focus:border-elegant-gold focus:ring-elegant-gold rounded-sm">
                    <option value="leadership" {{ old('type') == 'leadership' ? 'selected' : '' }}>Leadership</option>
                    <option value="member" {{ old('type') == 'member' ? 'selected' : '' }}>Member</option>
                </select>
                <x-input-error class="mt-2 text-red-400" :messages="$errors->get('type')" />
            </div>

            <!-- Image -->
            <div>
                <x-input-label for="image" :value="__('Profile Image')" class="text-gray-400" />
                <input id="image" name="image" type="file" 
                    class="mt-1 block w-full text-sm text-gray-400 border border-white/10 rounded-sm cursor-pointer bg-black/20 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-xs file:font-semibold file:bg-elegant-gold file:text-black hover:file:bg-yellow-600" 
                    accept="image/*">
                <x-input-error class="mt-2 text-red-400" :messages="$errors->get('image')" />
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-white/10">
                <button type="submit" class="bg-elegant-gold text-black hover:bg-yellow-600 font-bold py-2 px-6 rounded-sm transition text-sm uppercase tracking-wider">
                    {{ __('Add Member') }}
                </button>
                <a href="{{ route('admin.team.index') }}" class="text-gray-500 hover:text-white transition text-sm">Cancel</a>
            </div>
        </form>

    </div>
</x-admin-layout>
