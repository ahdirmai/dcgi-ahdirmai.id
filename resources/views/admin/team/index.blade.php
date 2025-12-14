<x-admin-layout>
    <x-slot name="header">
        {{ __('Manage Team') }}
    </x-slot>

    <div class="p-6 bg-elegant-charcoal shadow-lg sm:rounded-sm border border-white/5">
        
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <h3 class="text-lg font-medium text-white font-serif italic">{{ __('Team Members') }}</h3>
            
            <div class="flex flex-wrap items-center gap-4">
                <!-- Template Download -->
                <a href="{{ route('admin.team.template') }}" class="text-green-500 hover:text-green-400 font-medium text-xs uppercase tracking-wider flex items-center">
                    <i class="fa-solid fa-file-excel mr-2"></i> Template
                </a>

                <!-- Import Form -->
                <form action="{{ route('admin.team.import') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-2">
                    @csrf
                    <input type="file" name="file" required class="block w-full text-xs text-gray-400 border border-white/10 rounded-sm cursor-pointer bg-black/20 focus:outline-none file:mr-2 file:py-2 file:px-4 file:bg-gray-700 file:text-white file:border-0 hover:file:bg-gray-600">
                    <button type="submit" class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-sm text-xs uppercase tracking-wider">
                        Import
                    </button>
                </form>

                <a href="{{ route('admin.team.create') }}" class="bg-elegant-gold text-black hover:bg-yellow-600 font-bold py-2 px-6 rounded-sm text-xs uppercase tracking-wider">
                    {{ __('Add New') }}
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-white/10">
                <thead class="bg-black/20">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @foreach($team as $member)
                        <tr class="hover:bg-white/5 transition">
                            <td class="px-6 py-4 whitespace-nowrap font-bold text-white font-serif">{{ $member->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $member->role }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-bold rounded-sm uppercase tracking-wider {{ $member->type === 'leadership' ? 'bg-elegant-red/20 text-elegant-red border border-elegant-red/50' : 'bg-gray-700/50 text-gray-400 border border-gray-600' }}">
                                    {{ ucfirst($member->type) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($member->gallery)
                                    <img src="{{ $member->gallery->image_path }}" class="h-10 w-10 object-cover rounded-full border border-white/20">
                                @else
                                    <span class="text-gray-500 text-xs italic">No Image</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.team.edit', $member->id) }}" class="text-elegant-gold hover:text-white transition">Edit</a>
                                    <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400 transition">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @if($team->isEmpty())
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500 italic">No team members found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</x-admin-layout>
