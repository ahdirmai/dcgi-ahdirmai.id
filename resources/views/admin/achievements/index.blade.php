<x-admin-layout>
    <x-slot name="header">
        {{ __('Manage Achievements') }}
    </x-slot>

    <div class="p-6 bg-elegant-charcoal shadow-lg sm:rounded-sm border border-white/5">
        
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-medium text-white font-serif italic">{{ __('Achievement List') }}</h3>
            <a href="{{ route('admin.achievements.create') }}" class="bg-elegant-gold text-black hover:bg-yellow-600 font-bold py-2 px-4 rounded-sm text-sm uppercase tracking-wider">
                {{ __('Add New Achievement') }}
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-white/10">
                <thead class="bg-black/20">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Year</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Images</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @foreach($achievements as $achievement)
                        <tr class="hover:bg-white/5 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-elegant-gold font-bold">{{ $achievement->year }}</td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-white font-serif">{{ $achievement->title }}</div>
                                <div class="text-xs text-gray-500 mt-1 line-clamp-2">{{ $achievement->description }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-sm bg-white/10 text-gray-300">
                                    {{ $achievement->galleries->count() }} Images
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.achievements.edit', $achievement->id) }}" class="text-elegant-gold hover:text-white transition">Edit</a>
                                    <form action="{{ route('admin.achievements.destroy', $achievement->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400 transition">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @if($achievements->isEmpty())
                        <tr>
                             <td colspan="4" class="px-6 py-4 text-center text-gray-500 italic">No achievements found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</x-admin-layout>
