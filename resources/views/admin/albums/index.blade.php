<x-admin-layout>
    <x-slot name="header">
        {{ __('Manage Albums') }}
    </x-slot>

    <div class="p-6 bg-elegant-charcoal shadow-lg sm:rounded-sm border border-white/5">
        
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-medium text-white font-serif italic">{{ __('Album List') }}</h3>
            <a href="{{ route('admin.albums.create') }}" class="bg-elegant-gold text-black hover:bg-yellow-600 font-bold py-2 px-4 rounded-sm text-sm uppercase tracking-wider">
                {{ __('Add New Album') }}
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 text-sm text-green-400 rounded-sm bg-green-900/20 border border-green-900/50" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-white/10">
                <thead class="bg-black/20">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Cover</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @foreach($albums as $album)
                        <tr class="hover:bg-white/5 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $album->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($album->cover_image_path)
                                    <img src="{{ $album->cover_image_path }}" alt="Cover" class="h-10 w-10 object-cover rounded-sm">
                                @else
                                    <span class="text-gray-500 italic text-xs">No Image</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.albums.edit', $album->id) }}" class="text-elegant-gold hover:text-white transition">Edit</a>
                                    <form action="{{ route('admin.albums.destroy', $album->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400 transition">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @if($albums->isEmpty())
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500 italic">No albums found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</x-admin-layout>
