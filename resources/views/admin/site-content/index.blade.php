<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Site Content') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    @if(session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($errors->any())
                         <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- REMOVED OPENING FORM TAG -->
                        @csrf
                        @method('PATCH')

                        <form method="POST" action="{{ route('admin.site-content.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="section" value="hero">
                            
                            <!-- Hero Section Settings -->
                            <div class="border-b border-gray-200 pb-8">
                                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100 mb-4">Hero Section</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    
                                    <!-- Background Type -->
                                    <div>
                                        <label for="hero_background_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Background Type</label>
                                        <select id="hero_background_type" name="hero_background_type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                            <option value="image" {{ (old('hero_background_type', $contents['hero_background_type']->content ?? '') == 'image') ? 'selected' : '' }}>Image</option>
                                            <option value="video" {{ (old('hero_background_type', $contents['hero_background_type']->content ?? '') == 'video') ? 'selected' : '' }}>Video</option>
                                        </select>
                                    </div>

                                    <!-- Current Preview -->
                                    <div class="row-span-2">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Current Hero Background</label>
                                        <div class="border border-gray-300 dark:border-gray-600 rounded-md p-2 h-48 flex items-center justify-center bg-gray-50 dark:bg-gray-700 overflow-hidden">
                                            @if(isset($contents['hero_background_url']))
                                                @if(($contents['hero_background_type']->content ?? 'image') == 'video')
                                                    <video src="{{ asset($contents['hero_background_url']->content) }}" controls class="max-h-full max-w-full"></video>
                                                @else
                                                    <img src="{{ asset($contents['hero_background_url']->content) }}" alt="Hero Background" class="max-h-full max-w-full object-contain">
                                                @endif
                                            @else
                                                <span class="text-gray-400">No content uploaded</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- File Upload -->
                                    <div>
                                        <label for="hero_background_file" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload New Background (Image/Video)</label>
                                        <input type="file" name="hero_background_file" id="hero_background_file" class="mt-1 block w-full text-sm text-gray-500
                                          file:mr-4 file:py-2 file:px-4
                                          file:rounded-full file:border-0
                                          file:text-sm file:font-semibold
                                          file:bg-indigo-50 file:text-indigo-700
                                          hover:file:bg-indigo-100 dark:file:bg-gray-700 dark:file:text-gray-300
                                        ">
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Max size: 20MB. Formats: jpeg, png, mp4, mov.</p>
                                    </div>

                                    <div class="col-span-1 md:col-span-2 flex justify-end">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Save Hero Section
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('admin.site-content.update') }}" enctype="multipart/form-data" class="mt-8">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="section" value="about">

                            <!-- About Section Settings -->
                            <div class="border-b border-gray-200 pb-8">
                                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100 mb-4">About Section</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    
                                    <!-- File Upload -->
                                    <div>
                                        <label for="about_image_file" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload New About Image</label>
                                        <input type="file" name="about_image_file" id="about_image_file" class="mt-1 block w-full text-sm text-gray-500
                                          file:mr-4 file:py-2 file:px-4
                                          file:rounded-full file:border-0
                                          file:text-sm file:font-semibold
                                          file:bg-indigo-50 file:text-indigo-700
                                          hover:file:bg-indigo-100 dark:file:bg-gray-700 dark:file:text-gray-300
                                        ">
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Max size: 2MB. Formats: jpeg, png, jpg.</p>
                                    </div>

                                     <!-- Current Preview -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Current About Image</label>
                                        <div class="border border-gray-300 dark:border-gray-600 rounded-md p-2 h-48 flex items-center justify-center bg-gray-50 dark:bg-gray-700 overflow-hidden">
                                            @if(isset($contents['about_image_url']))
                                                <img src="{{ asset($contents['about_image_url']->content) }}" alt="About Image" class="max-h-full max-w-full object-contain">
                                            @else
                                                <span class="text-gray-400">No content uploaded</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-span-1 md:col-span-2 flex justify-end">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Save About Section
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>

                        <!-- Sponsorship Section Settings -->
                        <div class="border-b border-gray-200 pb-8">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100 mb-4">Sponsorship Logs</h3>
                            
                            <!-- List Existing Sponsorships -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Current Sponsors</label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                    @foreach($sponsorships as $sponsor)
                                        <div class="relative group bg-gray-50 dark:bg-gray-700 p-2 rounded-md border border-gray-200 dark:border-gray-600 flex items-center justify-center">
                                            <img src="{{ asset($sponsor->content) }}" class="h-16 object-contain">
                                            <form action="{{ route('admin.site-content.sponsor.destroy', $sponsor->id) }}" method="POST" class="absolute top-1 right-1 opacity-0 group-hover:opacity-100 transition">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-1 rounded-full w-6 h-6 flex items-center justify-center text-xs" onclick="return confirm('Delete this sponsor?')">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endforeach
                                    @if($sponsorships->isEmpty())
                                        <div class="col-span-full text-center py-4 text-gray-500 dark:text-gray-400 text-sm italic">
                                            No sponsors uploaded yet.
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Add New Sponsor -->
                            <form action="{{ route('admin.site-content.sponsor.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-md border border-gray-200 dark:border-gray-600">
                                    <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">Add New Sponsor</h4>
                                    <div class="flex items-end gap-4">
                                        <div class="flex-grow">
                                            <label for="sponsor_image" class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">Upload Logo</label>
                                            <input type="file" name="sponsor_image" id="sponsor_image" class="block w-full text-sm text-gray-500
                                                file:mr-4 file:py-2 file:px-4
                                                file:rounded-full file:border-0
                                                file:text-sm file:font-semibold
                                                file:bg-indigo-50 file:text-indigo-700
                                                hover:file:bg-indigo-100 dark:file:bg-gray-600 dark:file:text-gray-300
                                            " required>
                                        </div>
                                        <button type="submit" formaction="{{ route('admin.site-content.sponsor.store') }}" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                            Add Sponsor
                                        </button>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Max size: 2MB. Formats: jpeg, png, jpg.</p>
                                </div>
                            </form>
                        </div>

                        <form method="POST" action="{{ route('admin.site-content.update') }}" enctype="multipart/form-data" class="mt-8">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="section" value="social">

                            <!-- Social Media Links -->
                            <div class="border-b border-gray-200 pb-8">
                                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100 mb-4">Social Media Links</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    
                                    <div>
                                        <label for="social_instagram" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Instagram URL</label>
                                        <input type="text" name="social[instagram]" id="social_instagram" value="{{ old('social.instagram', $socials['instagram']->content ?? '') }}" class="mt-1 block w-full pl-3 pr-3 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="https://instagram.com/filename" autocomplete="off">
                                    </div>

                                    <div>
                                        <label for="social_tiktok" class="block text-sm font-medium text-gray-700 dark:text-gray-300">TikTok URL</label>
                                        <input type="text" name="social[tiktok]" id="social_tiktok" value="{{ old('social.tiktok', $socials['tiktok']->content ?? '') }}" class="mt-1 block w-full pl-3 pr-3 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="https://tiktok.com/@username">
                                    </div>

                                    <div>
                                        <label for="social_youtube" class="block text-sm font-medium text-gray-700 dark:text-gray-300">YouTube URL</label>
                                        <input type="text" name="social[youtube]" id="social_youtube" value="{{ old('social.youtube', $socials['youtube']->content ?? '') }}" class="mt-1 block w-full pl-3 pr-3 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="https://youtube.com/channel/...">
                                    </div>

                                    <div>
                                        <label for="social_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email Address</label>
                                        <input type="email" name="social[email]" id="social_email" value="{{ old('social.email', $socials['email']->content ?? '') }}" class="mt-1 block w-full pl-3 pr-3 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="contact@example.com">
                                    </div>

                                    <div class="col-span-1 md:col-span-2 flex justify-end">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Save Social Links
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
