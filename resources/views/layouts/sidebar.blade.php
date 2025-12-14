<aside class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-elegant-charcoal border-r border-white/10" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto custom-scrollbar flex flex-col justify-between">
        <div>
            <a href="{{ route('admin.dashboard') }}" class="flex items-center ps-2.5 mb-8">
                <span class="self-center text-xl font-serif font-bold whitespace-nowrap text-white">
                    G<span class="text-elegant-red">I</span>. Admin
                </span>
            </a>
            <ul class="space-y-2 font-medium">
                <li>
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="flex items-center p-2 text-gray-400 rounded-sm hover:text-white hover:bg-white/5 group {{ request()->routeIs('admin.dashboard') ? 'bg-white/5 text-white border-l-2 border-elegant-red/0 pl-2' : '' }}">
                        <i class="fa-solid fa-gauge w-6 text-center transition duration-75 group-hover:text-elegant-gold {{ request()->routeIs('admin.dashboard') ? 'text-elegant-gold' : 'text-gray-500' }}"></i>
                        <span class="ms-3">{{ __('Dashboard') }}</span>
                    </x-nav-link>
                </li>
                
                <li class="pt-4  text-xs font-bold text-gray-600 uppercase tracking-widest px-2 mb-2">Content Management</li>

                <li>
                    <x-nav-link :href="route('admin.site-content.index')" :active="request()->routeIs('admin.site-content.*')" class="flex items-center p-2 text-gray-400 rounded-sm hover:text-white hover:bg-white/5 group {{ request()->routeIs('admin.site-content.*') ? 'bg-white/5 text-white' : '' }}">
                        <i class="fa-solid fa-pen-to-square w-6 text-center transition duration-75 group-hover:text-elegant-gold {{ request()->routeIs('admin.site-content.*') ? 'text-elegant-gold' : 'text-gray-500' }}"></i>
                        <span class="ms-3">{{ __('Site Content') }}</span>
                    </x-nav-link>
                </li>
                 <li>
                    <x-nav-link :href="route('admin.vision-mission.index')" :active="request()->routeIs('admin.vision-mission.*')" class="flex items-center p-2 text-gray-400 rounded-sm hover:text-white hover:bg-white/5 group {{ request()->routeIs('admin.vision-mission.*') ? 'bg-white/5 text-white' : '' }}">
                        <i class="fa-solid fa-bullseye w-6 text-center transition duration-75 group-hover:text-elegant-gold {{ request()->routeIs('admin.vision-mission.*') ? 'text-elegant-gold' : 'text-gray-500' }}"></i>
                        <span class="ms-3">{{ __('Vision & Mission') }}</span>
                    </x-nav-link>
                </li>
            </ul>

             <div class="mt-4 pt-4 border-t border-white/5">
                <p class="px-2 text-xs font-bold text-gray-600 uppercase tracking-widest mb-2">Modules</p>
                <ul class="space-y-2 font-medium">
                    <li>
                        <x-nav-link :href="route('admin.albums.index')" :active="request()->routeIs('admin.albums.*')" class="flex items-center p-2 text-gray-400 rounded-sm hover:text-white hover:bg-white/5 group {{ request()->routeIs('admin.albums.*') ? 'bg-white/5 text-white' : '' }}">
                            <i class="fa-solid fa-images w-6 text-center transition duration-75 group-hover:text-elegant-gold {{ request()->routeIs('admin.albums.*') ? 'text-elegant-gold' : 'text-gray-500' }}"></i>
                            <span class="ms-3">{{ __('Gallery') }}</span>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link :href="route('admin.achievements.index')" :active="request()->routeIs('admin.achievements.*')" class="flex items-center p-2 text-gray-400 rounded-sm hover:text-white hover:bg-white/5 group {{ request()->routeIs('admin.achievements.*') ? 'bg-white/5 text-white' : '' }}">
                            <i class="fa-solid fa-trophy w-6 text-center transition duration-75 group-hover:text-elegant-gold {{ request()->routeIs('admin.achievements.*') ? 'text-elegant-gold' : 'text-gray-500' }}"></i>
                            <span class="ms-3">{{ __('Achievements') }}</span>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link :href="route('admin.team.index')" :active="request()->routeIs('admin.team.*')" class="flex items-center p-2 text-gray-400 rounded-sm hover:text-white hover:bg-white/5 group {{ request()->routeIs('admin.team.*') ? 'bg-white/5 text-white' : '' }}">
                            <i class="fa-solid fa-users w-6 text-center transition duration-75 group-hover:text-elegant-gold {{ request()->routeIs('admin.team.*') ? 'text-elegant-gold' : 'text-gray-500' }}"></i>
                            <span class="ms-3">{{ __('Team') }}</span>
                        </x-nav-link>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="pt-4 mt-4 space-y-2 border-t border-white/10">
            <a href="{{ route('profile.edit') }}" class="flex items-center p-2 text-gray-400 rounded-sm hover:text-white hover:bg-white/5 group transition duration-75">
                <i class="fa-solid fa-user-circle w-6 text-center text-gray-500 group-hover:text-white transition duration-75"></i>
                <span class="ms-3">{{ Auth::user()->name }}</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center p-2 text-gray-400 rounded-sm hover:text-elegant-red hover:bg-white/5 group transition duration-75 cursor-pointer">
                     <i class="fa-solid fa-right-from-bracket w-6 text-center text-gray-500 group-hover:text-elegant-red transition duration-75"></i>
                    <span class="ms-3">{{ __('Sign Out') }}</span>
                </a>
            </form>
        </div>
    </div>
</aside>
