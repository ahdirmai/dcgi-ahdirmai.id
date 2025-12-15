<nav x-data="{ mobileMenuOpen: false, scrolled: false }" 
     @scroll.window="scrolled = (window.pageYOffset > 20)"
     :class="{ 'bg-black/90': scrolled, 'bg-gradient-to-b from-black/90 to-transparent': !scrolled }"
     class="fixed w-full z-50 transition-all duration-500 pt-4 pb-2">
    <div class="container mx-auto px-6 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-2xl font-serif font-bold tracking-widest text-white border-b border-elegant-red pb-1 hover:text-elegant-gold transition duration-300">
            G<span class="text-elegant-red">I</span>.
        </a>

        <!-- Desktop Menu -->
        <div class="hidden md:flex space-x-12 text-xs font-medium tracking-[0.2em] uppercase text-gray-400">
            <a href="{{ Request::is('/') ? '#about' : url('/#about') }}" class="hover:text-white transition duration-300 relative group">Tentang</a>
            <a href="{{ Request::is('/') ? '#vision' : url('/#vision') }}" class="hover:text-white transition duration-300 relative group">Visi</a>
            
            <a href="{{ Request::is('/') ? '#gallery' : route('gallery.index') }}" 
               class="{{ Request::routeIs('gallery.*') ? 'text-white' : 'hover:text-white' }} transition duration-300 relative group">
               Galeri
            </a>
            
            <a href="{{ Request::is('/') ? '#team' : route('members.index') }}" 
               class="{{ Request::routeIs('members.*') ? 'text-white' : 'hover:text-white' }} transition duration-300 relative group">
               Tim
            </a>
        </div>

        <a href="{{ Request::is('/') ? '#contact' : url('/#contact') }}" class="hidden md:block text-xs font-bold tracking-widest uppercase text-white border border-white/20 px-6 py-2 hover:bg-elegant-red hover:border-elegant-red transition duration-300 rounded-sm">
            Kontak
        </a>
        
        <!-- Mobile Menu Button -->
        <div @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-white text-xl cursor-pointer z-50">
            <i class="fa-solid" :class="mobileMenuOpen ? 'fa-xmark' : 'fa-bars-staggered'"></i>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-full"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-full"
         class="fixed inset-0 bg-elegant-black z-40 flex flex-col items-center justify-center space-y-8 md:hidden">
        
        <a href="{{ Request::is('/') ? '#about' : url('/#about') }}" @click="mobileMenuOpen = false" class="text-white text-xl font-serif tracking-widest hover:text-elegant-red transition">Tentang</a>
        <a href="{{ Request::is('/') ? '#vision' : url('/#vision') }}" @click="mobileMenuOpen = false" class="text-white text-xl font-serif tracking-widest hover:text-elegant-red transition">Visi</a>
        
        <a href="{{ Request::is('/') ? '#gallery' : route('gallery.index') }}" @click="mobileMenuOpen = false" class="text-white text-xl font-serif tracking-widest hover:text-elegant-red transition">Galeri</a>
        <a href="{{ Request::is('/') ? '#team' : route('members.index') }}" @click="mobileMenuOpen = false" class="text-white text-xl font-serif tracking-widest hover:text-elegant-red transition">Tim</a>
        
        <a href="{{ Request::is('/') ? '#contact' : url('/#contact') }}" @click="mobileMenuOpen = false" class="text-elegant-gold text-xl font-serif tracking-widest hover:text-white transition">Kontak</a>
        
    </div>
</nav>
