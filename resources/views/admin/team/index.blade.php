<x-admin-layout>
    <x-slot name="header">
        {{ __('Manage Team') }}
    </x-slot>

    <div class="p-6 bg-elegant-charcoal shadow-lg sm:rounded-sm border border-white/5">
        
        <!-- Search & Filter -->
        <div class="mb-6 bg-black/20 p-4 rounded-sm border border-white/5">
            <form action="{{ route('admin.team.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or role..." class="w-full bg-black/30 border-white/10 text-gray-300 text-xs rounded-sm focus:border-elegant-gold focus:ring-elegant-gold">
                </div>
                <div class="w-full md:w-48">
                    <select name="type" class="w-full bg-black/30 border-white/10 text-gray-300 text-xs rounded-sm focus:border-elegant-gold focus:ring-elegant-gold">
                        <option value="">All Types</option>
                        <option value="leadership" {{ request('type') == 'leadership' ? 'selected' : '' }}>Leadership</option>
                        <option value="member" {{ request('type') == 'member' ? 'selected' : '' }}>Member</option>
                    </select>
                </div>
                <div class="w-full md:w-48">
                    <select name="section" class="w-full bg-black/30 border-white/10 text-gray-300 text-xs rounded-sm focus:border-elegant-gold focus:ring-elegant-gold">
                        <option value="">All Sections</option>
                        @foreach($sections as $section)
                            <option value="{{ $section }}" {{ request('section') == $section ? 'selected' : '' }}>{{ $section }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="bg-elegant-gold text-black font-bold py-2 px-6 rounded-sm text-xs uppercase tracking-wider hover:bg-yellow-600 transition">
                    Filter
                </button>
                @if(request()->hasAny(['search', 'type', 'section']))
                    <a href="{{ route('admin.team.index') }}" class="flex items-center justify-center bg-gray-700 text-white font-bold py-2 px-6 rounded-sm text-xs uppercase tracking-wider hover:bg-gray-600 transition">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <h3 class="text-lg font-medium text-white font-serif italic">{{ __('Team Members List') }}</h3>
            
            <div class="flex flex-wrap items-center gap-4">
                <a href="{{ route('admin.team.template') }}" class="text-green-500 hover:text-green-400 font-medium text-xs uppercase tracking-wider flex items-center">
                    <i class="fa-solid fa-file-excel mr-2"></i> Template
                </a>

                <form action="{{ route('admin.team.import') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-2">
                    @csrf
                    <input type="file" name="file" required class="block w-32 md:w-full text-[10px] text-gray-400 border border-white/10 rounded-sm cursor-pointer bg-black/20 focus:outline-none file:mr-2 file:py-1 file:px-2 file:bg-gray-700 file:text-white file:border-0 hover:file:bg-gray-600">
                    <button type="submit" class="bg-green-700 hover:bg-green-600 text-white font-bold py-1 px-3 rounded-sm text-[10px] uppercase tracking-wider">
                        Import
                    </button>
                </form>

                <a href="{{ route('admin.team.create') }}" class="bg-elegant-gold text-black hover:bg-yellow-600 font-bold py-2 px-6 rounded-sm text-xs uppercase tracking-wider">
                    Add New
                </a>
            </div>
        </div>

        <div class="overflow-x-auto mb-4">
            <table class="min-w-full divide-y divide-white/10">
                <thead class="bg-black/20">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Section</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Star</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @foreach($team as $member)
                        <tr class="hover:bg-white/5 transition">
                            <td class="px-6 py-4 whitespace-nowrap font-bold text-white font-serif">{{ $member->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $member->role }}</td>
                             <td class="px-6 py-4 whitespace-nowrap text-gray-400 text-xs uppercase tracking-wide">{{ $member->section ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-bold rounded-sm uppercase tracking-wider {{ $member->type === 'leadership' ? 'bg-elegant-red/20 text-elegant-red border border-elegant-red/50' : 'bg-gray-700/50 text-gray-400 border border-gray-600' }}">
                                    {{ ucfirst($member->type) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($member->type === 'leadership')
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer toggle-star" data-id="{{ $member->id }}" {{ $member->star ? 'checked' : '' }}>
                                        <div class="relative w-9 h-5 bg-gray-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-elegant-gold rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-elegant-gold"></div>
                                    </label>
                                @else
                                    <span class="text-gray-600 text-xs">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($member->gallery)
                                    <img src="{{ $member->gallery->image_path }}" class="h-10 w-10 object-cover rounded-full border border-white/20">
                                @else
                                    <div class="h-10 w-10 rounded-full bg-gray-800 flex items-center justify-center text-xs text-gray-500 border border-white/10">N/A</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.team.edit', $member->id) }}" class="text-elegant-gold hover:text-white transition"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400 transition"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @if($team->isEmpty())
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500 italic">
                                No team members found.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $team->withQueryString()->links() }}
        </div>

    </div>

    <script>
        document.querySelectorAll('.toggle-star').forEach(toggle => {
            toggle.addEventListener('change', function() {
                const id = this.dataset.id;
                const isChecked = this.checked;

                fetch(`/admin/team/${id}/toggle-star`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // If we turned this one ON, turn off all others visually
                        if (isChecked) {
                            document.querySelectorAll('.toggle-star').forEach(other => {
                                if (other !== this) {
                                    other.checked = false;
                                }
                            });
                        }
                    } else {
                        // Revert if failed
                        this.checked = !isChecked;
                        alert('Something went wrong.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    this.checked = !isChecked;
                });
            });
        });
    </script>
</x-admin-layout>
