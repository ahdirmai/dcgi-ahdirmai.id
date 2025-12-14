<x-admin-layout>
    <x-slot name="header">
        {{ __('Manage Site Content') }}
    </x-slot>

    <div class="space-y-6">
        
        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-green-400 rounded-sm bg-green-900/20 border border-green-900/50" role="alert">
                <span class="font-medium">Success!</span> {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
             <div class="p-4 mb-4 text-sm text-red-400 rounded-sm bg-red-900/20 border border-red-900/50" role="alert">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Hero Section -->
        <div class="p-6 bg-elegant-charcoal shadow-lg sm:rounded-sm border border-white/5">
            <h3 class="text-lg font-medium text-white font-serif italic mb-6 border-b border-white/10 pb-2">{{ __('Hero Section') }}</h3>
            
            <form method="POST" action="{{ route('admin.site-content.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="hidden" name="section" value="hero">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Background Type -->
                    <div>
                        <label for="hero_background_type" class="block text-sm font-medium text-gray-400 mb-1">Background Type</label>
                        <select id="hero_background_type" name="hero_background_type" class="bg-black/20 block w-full pl-3 pr-10 py-2 text-base border-white/10 focus:outline-none focus:ring-elegant-gold focus:border-elegant-gold sm:text-sm rounded-sm text-gray-300">
                            <option value="image" {{ (old('hero_background_type', $contents['hero_background_type']->content ?? '') == 'image') ? 'selected' : '' }}>Image</option>
                            <option value="video" {{ (old('hero_background_type', $contents['hero_background_type']->content ?? '') == 'video') ? 'selected' : '' }}>Video</option>
                        </select>
                    </div>

                    <!-- Current Preview -->
                    <div class="row-span-2">
                        <label class="block text-sm font-medium text-gray-400 mb-2">Current Background</label>
                        <div class="border border-white/10 rounded-sm p-2 h-48 flex items-center justify-center bg-black/40 overflow-hidden">
                            @if(isset($contents['hero_background_url']))
                                @if(($contents['hero_background_type']->content ?? 'image') == 'video')
                                    <video src="{{ asset($contents['hero_background_url']->content) }}" controls class="max-h-full max-w-full"></video>
                                @else
                                    <img src="{{ asset($contents['hero_background_url']->content) }}" alt="Hero Background" class="max-h-full max-w-full object-contain">
                                @endif
                            @else
                                <span class="text-gray-500 italic">No content uploaded</span>
                            @endif
                        </div>
                    </div>

                    <!-- File Upload -->
                    <div>
                        <label for="hero_background_file" class="block text-sm font-medium text-gray-400 mb-1">Upload New (Image/Video)</label>
                        <input type="file" name="hero_background_file" id="hero_background_file" class="block w-full text-sm text-gray-400
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-sm file:border-0
                          file:text-xs file:font-semibold
                          file:bg-elegant-red file:text-white
                          hover:file:bg-red-800
                          cursor-pointer bg-black/20 border border-white/10
                        ">
                        <p class="mt-1 text-xs text-gray-500">Max size: 20MB. Formats: jpeg, png, mp4, mov.</p>
                    </div>

                    <div class="col-span-1 md:col-span-2 flex justify-end">
                        <button type="submit" class="bg-elegant-gold text-black hover:bg-yellow-600 font-bold py-2 px-6 rounded-sm transition text-sm uppercase tracking-wider">
                            Save Changes
                        </button>
                    </div>

                </div>
            </form>
        </div>

        <!-- About Section -->
        <div class="p-6 bg-elegant-charcoal shadow-lg sm:rounded-sm border border-white/5">
            <h3 class="text-lg font-medium text-white font-serif italic mb-6 border-b border-white/10 pb-2">{{ __('About Section') }}</h3>

            <form method="POST" action="{{ route('admin.site-content.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="hidden" name="section" value="about">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- File Upload -->
                    <div>
                        <label for="about_image_file" class="block text-sm font-medium text-gray-400 mb-1">Upload New About Image</label>
                        <input type="file" name="about_image_file" id="about_image_file" class="block w-full text-sm text-gray-400
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-sm file:border-0
                          file:text-xs file:font-semibold
                          file:bg-elegant-red file:text-white
                          hover:file:bg-red-800
                          cursor-pointer bg-black/20 border border-white/10
                        ">
                        <p class="mt-1 text-xs text-gray-500">Max size: 2MB. Formats: jpeg, png, jpg.</p>
                    </div>

                     <!-- Current Preview -->
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Current Image</label>
                        <div class="border border-white/10 rounded-sm p-2 h-48 flex items-center justify-center bg-black/40 overflow-hidden">
                            @if(isset($contents['about_image_url']))
                                <img src="{{ asset($contents['about_image_url']->content) }}" alt="About Image" class="max-h-full max-w-full object-contain">
                            @else
                                <span class="text-gray-500 italic">No content uploaded</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-2 flex justify-end">
                        <button type="submit" class="bg-elegant-gold text-black hover:bg-yellow-600 font-bold py-2 px-6 rounded-sm transition text-sm uppercase tracking-wider">
                            Save Changes
                        </button>
                    </div>

                </div>
            </form>
        </div>

        <!-- Sponsorship Section -->
        <div class="p-6 bg-elegant-charcoal shadow-lg sm:rounded-sm border border-white/5">
            <h3 class="text-lg font-medium text-white font-serif italic mb-6 border-b border-white/10 pb-2">{{ __('Sponsporships') }}</h3>
            
            <!-- List Existing Sponsorships -->
            <div class="mb-8">
                <label class="block text-sm font-medium text-gray-400 mb-4">Current Sponsors</label>
                <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
                    @foreach($sponsorships as $sponsor)
                        <div class="relative group bg-white/5 p-4 rounded-sm border border-white/10 flex items-center justify-center h-24">
                            <img src="{{ asset($sponsor->content) }}" class="h-12 object-contain grayscale group-hover:grayscale-0 transition">
                            <form action="{{ route('admin.site-content.sponsor.destroy', $sponsor->id) }}" method="POST" class="absolute -top-2 -right-2 opacity-0 group-hover:opacity-100 transition">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-900 border border-red-500 hover:bg-red-700 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs" onclick="return confirm('Delete this sponsor?')">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                    @if($sponsorships->isEmpty())
                        <div class="col-span-full text-center py-4 text-gray-500 italic text-sm">
                            No sponsors uploaded yet.
                        </div>
                    @endif
                </div>
            </div>

            <!-- Add New Sponsor -->
            <form action="{{ route('admin.site-content.sponsor.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="bg-black/20 p-4 rounded-sm border border-white/10">
                    <h4 class="text-sm font-medium text-gray-300 mb-4">Add New Sponsor</h4>
                    <div class="flex items-end gap-4">
                        <div class="flex-grow">
                            <label for="sponsor_image" class="block text-xs font-medium text-gray-500 mb-1">Upload Logo</label>
                            <input type="file" name="sponsor_image" id="sponsor_image" class="block w-full text-sm text-gray-400
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-sm file:border-0
                                file:text-xs file:font-semibold
                                file:bg-gray-700 file:text-white
                                hover:file:bg-gray-600
                                cursor-pointer
                            " required>
                        </div>
                        <button type="submit" formaction="{{ route('admin.site-content.sponsor.store') }}" class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-sm text-sm">
                            <i class="fa-solid fa-plus mr-1"></i> Add
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Social Media Section -->
        <div class="p-6 bg-elegant-charcoal shadow-lg sm:rounded-sm border border-white/5">
             <h3 class="text-lg font-medium text-white font-serif italic mb-6 border-b border-white/10 pb-2">{{ __('Social Media') }}</h3>

            <form method="POST" action="{{ route('admin.site-content.update') }}">
                @csrf
                @method('PATCH')
                <input type="hidden" name="section" value="social">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div class="relative">
                         <label for="social_instagram" class="block text-sm font-medium text-gray-400 mb-1">Instagram</label>
                         <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-brands fa-instagram text-gray-500"></i>
                            </div>
                            <input type="text" name="social[instagram]" id="social_instagram" value="{{ old('social.instagram', $socials['instagram']->content ?? '') }}" class="bg-black/20 pl-10 block w-full border-white/10 focus:ring-elegant-gold focus:border-elegant-gold rounded-sm text-gray-300" placeholder="URL">
                         </div>
                    </div>

                    <div class="relative">
                        <label for="social_tiktok" class="block text-sm font-medium text-gray-400 mb-1">TikTok</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-brands fa-tiktok text-gray-500"></i>
                            </div>
                            <input type="text" name="social[tiktok]" id="social_tiktok" value="{{ old('social.tiktok', $socials['tiktok']->content ?? '') }}" class="bg-black/20 pl-10 block w-full border-white/10 focus:ring-elegant-gold focus:border-elegant-gold rounded-sm text-gray-300" placeholder="URL">
                        </div>
                    </div>

                    <div class="relative">
                        <label for="social_youtube" class="block text-sm font-medium text-gray-400 mb-1">YouTube</label>
                         <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-brands fa-youtube text-gray-500"></i>
                            </div>
                            <input type="text" name="social[youtube]" id="social_youtube" value="{{ old('social.youtube', $socials['youtube']->content ?? '') }}" class="bg-black/20 pl-10 block w-full border-white/10 focus:ring-elegant-gold focus:border-elegant-gold rounded-sm text-gray-300" placeholder="URL">
                        </div>
                    </div>

                    <div class="relative">
                        <label for="social_email" class="block text-sm font-medium text-gray-400 mb-1">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-envelope text-gray-500"></i>
                            </div>
                            <input type="email" name="social[email]" id="social_email" value="{{ old('social.email', $socials['email']->content ?? '') }}" class="bg-black/20 pl-10 block w-full border-white/10 focus:ring-elegant-gold focus:border-elegant-gold rounded-sm text-gray-300" placeholder="Address">
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-2 flex justify-end">
                        <button type="submit" class="bg-elegant-gold text-black hover:bg-yellow-600 font-bold py-2 px-6 rounded-sm transition text-sm uppercase tracking-wider">
                            Save Changes
                        </button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</x-admin-layout>
