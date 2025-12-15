<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Primary Meta Tags -->
    <title>DC Genderang Irama - Marching Band MAN 2 BANJARMASIN</title>
    <meta name="title" content="DC Genderang Irama - Marching Band MAN 2 BANJARMASIN">
    <meta name="description" content="Website Resmi Drum Corps Genderang Irama (DCGI) MAN 2 BANJARMASIN. Unit marching band berprestasi yang memadukan kedisiplinan, seni musik, dan visual artistik sejak 2009.">
    <meta name="keywords" content="DCGI, Drum Corps Genderang Irama, Marching Band Banjarmasin, MAN 2 BANJARMASIN, Ekstrakurikuler MAN 2, Drumband Kalsel, Seni Pertunjukan">
    <meta name="author" content="DC Genderang Irama">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url('/') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="DC Genderang Irama - Marching Band MAN 2 BANJARMASIN">
    <meta property="og:description" content="Website Resmi Drum Corps Genderang Irama (DCGI) MAN 2 BANJARMASIN. Unit marching band berprestasi yang memadukan kedisiplinan, seni musik, dan visual artistik.">
    <meta property="og:image" content="{{ asset('banner.png') }}"> <!-- Ganti dengan URL gambar preview yang lebih besar jika ada -->

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta property="twitter:title" content="DC Genderang Irama - Marching Band MAN 2 BANJARMASIN">
    <meta property="twitter:description" content="Website Resmi Drum Corps Genderang Irama (DCGI) MAN 2 BANJARMASIN. Unit marching band berprestasi yang memadukan kedisiplinan, seni musik, dan visual artistik.">
    <meta property="twitter:image" content="{{ asset('banner.png') }}"> <!-- Ganti dengan URL gambar preview yang lebih besar jika ada -->

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
        {!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <style>
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }
        .animate-on-scroll.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
        .animate-on-scroll.is-hidden {
            opacity: 0;
            transform: translateY(30px);
        }
    </style>
</head>
<body class="font-sans bg-elegant-black text-elegant-text antialiased selection:bg-elegant-red selection:text-white">

    <x-navbar />

    <header class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            @php
                $heroType = $siteContent['hero_background_type']->content ?? 'image';
                $heroUrl = $siteContent['hero_background_url']->content ?? 'https://picsum.photos/1920/1080?grayscale&blur=2';
            @endphp

            @if($heroType == 'video')
                <video autoplay loop muted playsinline class="w-full h-full object-cover opacity-80 scale-105">
                    <source src="{{ asset($heroUrl) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @else
                <img src="{{ Str::startsWith($heroUrl, 'http') ? $heroUrl : asset($heroUrl) }}" alt="Hero Background" class="w-full h-full object-cover opacity-70 scale-105 animate-[pulse_10s_ease-in-out_infinite]">
            @endif
            
            <div class="absolute inset-0 bg-gradient-to-t from-elegant-black via-elegant-black/60 to-elegant-red/10 mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-black/40 to-elegant-black/90"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <p class="animate-fade-up text-elegant-gold font-medium tracking-[0.4em] text-xs md:text-sm uppercase mb-6">
                Est. 2009 • Indonesia
            </p>
            <h1 class="animate-fade-up delay-200 font-serif text-5xl md:text-8xl text-white leading-tight mb-8">
                DC Genderang <br> <span class="italic text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-elegant-red text-glow">Irama</span>
            </h1>
            <p class="animate-fade-up delay-400 text-gray-400 text-sm md:text-lg max-w-lg mx-auto leading-loose font-light tracking-wide mb-12">
                Harmoni musik dan kedisiplinan gerak dalam balutan visual artistik. Sebuah dedikasi seni tanpa batas.
            </p>
            
            <div class="animate-fade-up delay-400">
                <a href="#about" class="group inline-flex items-center gap-4 text-white hover:text-elegant-gold transition duration-300 cursor-pointer">
                    <span class="text-xs font-bold tracking-[0.2em] uppercase">Jelajahi Profil</span>
                    <span class="w-12 h-[1px] bg-white group-hover:w-20 group-hover:bg-elegant-gold transition-all duration-300"></span>
                </a>
            </div>
        </div>
    </header>

    <section id="about" class="py-32 relative">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center gap-20">
                <div class="lg:w-1/2 order-2 lg:order-1">
                    <h2 class="animate-on-scroll font-serif text-4xl md:text-5xl text-white mb-8 leading-snug">
                        Seni, Disiplin, & <br> <span class="text-elegant-red italic">Kreativitas.</span>
                    </h2>
                    <div class="w-20 h-[2px] bg-gradient-to-r from-elegant-red to-transparent mb-8 animate-on-scroll"></div>
                    
                    <p class="animate-on-scroll text-gray-400 leading-8 font-light mb-6 text-justify">
                        <span class="text-5xl float-left mr-3 mt-[-10px] font-serif text-elegant-gold">D</span>rum Corps Genderang Irama berdiri sejak tahun 2009 sebagai wujud dedikasi terhadap seni pertunjukan. Kami bukan sekadar barisan musisi; kami adalah perpaduan sinergis antara musik, visual, dan karakter.
                    </p>
                    <div class="grid grid-cols-2 gap-8 border-t border-white/10 pt-8">
                        <div class="animate-on-scroll">
                            <p class="font-serif text-3xl text-white">15<span class="text-elegant-red text-xl">+</span></p>
                            <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Tahun Berkarya</p>
                        </div>
                        <div class="animate-on-scroll" style="transition-delay: 100ms;">
                            <p class="font-serif text-3xl text-white">4<span class="text-elegant-red text-xl">+</span></p>
                            <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Gelar Bergengsi</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 order-1 lg:order-2 relative animate-on-scroll">
                    <div class="absolute -top-4 -right-4 w-full h-full border border-elegant-red/30 z-0"></div>
                    <div class="relative z-10 overflow-hidden shadow-[0_0_50px_rgba(0,0,0,0.5)]">
                        @php
                            $aboutUrl = $siteContent['about_image_url']->content ?? 'https://picsum.photos/600/800?grayscale';
                        @endphp
                        <img src="{{ Str::startsWith($aboutUrl, 'http') ? $aboutUrl : asset($aboutUrl) }}" alt="Marching Art" class="w-full grayscale hover:grayscale-0 transition duration-1000 ease-in-out transform hover:scale-105">
                        <div class="absolute bottom-0 left-0 bg-elegant-red/90 p-4">
                            <i class="fa-solid fa-music text-white text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="vision" class="py-24 bg-fixed relative">
        <div class="absolute inset-0 bg-[url('https://picsum.photos/1920/1080?blur=10')] bg-cover bg-center opacity-20 pointer-events-none mix-blend-overlay"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-elegant-black via-transparent to-elegant-black pointer-events-none"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16 animate-on-scroll">
                <span class="text-elegant-gold text-xs font-bold tracking-[0.3em] uppercase">Core Values</span>
                <h2 class="font-serif text-4xl text-white mt-4">Visi & Misi</h2>
            </div>
            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <div class="animate-on-scroll glass-panel p-10 rounded-sm hover:border-elegant-red/50 transition duration-500 group">
                    <h3 class="font-serif text-2xl text-white mb-6 italic group-hover:text-elegant-red transition">"Our Vision"</h3>
                    <p class="text-gray-300 font-light leading-relaxed italic border-l-2 border-elegant-gold pl-6">
                        {{ $vision?->content ?? 'No Vision Set' }}
                    </p>
                </div>
                <div class="animate-on-scroll glass-panel p-10 rounded-sm hover:border-elegant-red/50 transition duration-500" style="transition-delay: 200ms;">
                    <h3 class="font-serif text-2xl text-white mb-6 italic">"Our Mission"</h3>
                    <ul class="space-y-4">
                        @foreach($missions as $index => $mission)
                        <li class="flex items-start group">
                            <span class="text-elegant-red mr-4 text-xs mt-1 group-hover:text-white transition">{{ sprintf('%02d', $index + 1) }}</span>
                            <p class="text-gray-400 font-light text-sm leading-relaxed">{{ $mission->content }}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="gallery" class="py-32 bg-elegant-black relative">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-12">
                <div class="animate-on-scroll">
                    <h2 class="font-serif text-4xl text-white">Visual <span class="italic text-elegant-red">Art.</span></h2>
                    <p class="text-gray-500 text-sm mt-2 tracking-wide">Momen terbaik dalam setiap detak.</p>
                </div>
                <a href="{{ route('gallery.index') }}" class="hidden md:block text-xs font-bold text-elegant-gold tracking-[0.2em] uppercase hover:text-white transition">View Gallery <i class="fa-solid fa-arrow-right ml-2"></i></a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-4 h-auto md:h-[600px]">
                
                @foreach($albums as $index => $album)
                    @php
                        // Logic to mimic the grid layout (2 span for first item, etc if desired, or just list them)
                        // Original had 4 items: 1st is col-span-2 row-span-2. 2nd is col-1 row-2. 3rd co-1 row-1. 4th col-1 row-1.
                        // We can just loop and apply classes based on index.
                        $classes = 'md:col-span-1 md:row-span-1';
                        if ($index == 0) $classes = 'md:col-span-2 md:row-span-2';
                        if ($index == 1) $classes = 'md:col-span-1 md:row-span-2';
                    @endphp
                    <div class="{{ $classes }} group relative overflow-hidden rounded-sm cursor-pointer animate-on-scroll" style="transition-delay: {{ $index * 100 }}ms;">
                        <img src="{{ $album->cover_image_path }}" alt="{{ $album->title }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 group-hover:grayscale-0">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition duration-500 flex items-end p-6">
                            <span class="text-white font-serif italic text-xl">{{ $album->title }}</span>
                        </div>
                    </div>
                @endforeach

            </div>
            
            <div class="mt-8 md:hidden text-center">
                <a href="{{ route('gallery.index') }}" class="text-xs font-bold text-elegant-gold tracking-[0.2em] uppercase">View Gallery</a>
            </div>
        </div>
    </section>

    <section id="achievements" class="py-32 bg-elegant-charcoal overflow-hidden border-t border-gray-900">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-20 pb-6 animate-on-scroll">
            <h2 class="font-serif text-4xl md:text-5xl text-white">Jejak<br>Prestasi</h2>
            <p class="text-gray-500 text-sm mt-4 md:mt-0 max-w-xs text-right">Klik pada pencapaian untuk melihat dokumentasi foto.</p>
        </div>

        <div class="relative">
            <div class="absolute left-4 md:left-1/2 transform md:-translate-x-1/2 h-full w-[1px] bg-gradient-to-b from-elegant-red via-gray-800 to-transparent"></div>
            <div class="space-y-16">
                
                @foreach($achievements as $index => $achievement)
                    @php
                       // Alternating Layout
                       $isLeft = $index % 2 == 0;
                    @endphp
                    <div onclick="openModal('{{ $achievement->id }}')" class="relative flex flex-col md:flex-row items-center w-full group cursor-pointer animate-on-scroll">
                         @if($isLeft)
                            <div class="w-full md:w-1/2 md:pr-12 pl-12 md:pl-0 md:text-right transition duration-300 group-hover:-translate-x-2">
                                <span class="text-elegant-gold font-bold tracking-widest text-sm">{{ $achievement->year }}</span>
                                <h3 class="font-serif text-2xl text-white mt-1 group-hover:text-elegant-red transition">{{ $achievement->title }} <i class="fa-solid fa-camera text-xs ml-2 opacity-0 group-hover:opacity-100 transition"></i></h3>
                                <p class="text-gray-500 text-sm mt-2">{{ $achievement->description }}</p>
                            </div>
                            <div class="absolute left-4 md:left-1/2 transform -translate-x-1/2 w-3 h-3 bg-black border border-elegant-red rounded-full z-10 group-hover:scale-150 group-hover:bg-elegant-red transition duration-300 shadow-[0_0_10px_rgba(216,0,50,0.5)]"></div>
                            <div class="hidden md:block w-1/2"></div>
                        @else
                            <div class="hidden md:block w-1/2"></div>
                            <div class="absolute left-4 md:left-1/2 transform -translate-x-1/2 w-3 h-3 bg-black border border-white rounded-full z-10 group-hover:scale-150 group-hover:bg-white transition duration-300"></div>
                            <div class="w-full md:w-1/2 pl-12 transition duration-300 group-hover:translate-x-2">
                                <span class="text-gray-400 font-bold tracking-widest text-sm">{{ $achievement->year }}</span>
                                <h3 class="font-serif text-2xl text-white mt-1 group-hover:text-elegant-red transition">{{ $achievement->title }} <i class="fa-solid fa-camera text-xs ml-2 opacity-0 group-hover:opacity-100 transition"></i></h3>
                                <p class="text-gray-500 text-sm mt-2">{{ $achievement->description }}</p>
                            </div>
                        @endif
                    </div>
                @endforeach

            </div>
            
            <div class="mt-16 text-center animate-on-scroll">
                 <a href="{{ route('achievements.index') }}" class="inline-block px-10 py-4 border border-white/20 text-white font-bold text-xs uppercase tracking-[0.2em] hover:bg-white hover:text-black transition duration-300">
                    View All Achievements
                </a>
            </div>
        </div>
    </div>
</section>

    <section id="team" class="py-32 bg-elegant-black">
        <div class="container mx-auto px-6 text-center">
            
            <span class="text-elegant-gold text-xs font-bold tracking-[0.3em] uppercase animate-on-scroll">Leadership</span>
            <h2 class="font-serif text-4xl text-white mt-4 mb-16 animate-on-scroll">The Minds Behind</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-5xl mx-auto mb-16">
                @foreach($leadership as $index => $leader)
                    <div class="group cursor-pointer {{ $leader->star ? 'md:-mt-8' : '' }} animate-on-scroll transition-all duration-300 hover:transform hover:scale-105" style="transition-delay: {{ $index * 150 }}ms;">
                         <div class="relative overflow-hidden mb-6 aspect-[3/4] {{ $leader->star ? 'shadow-[0_0_30px_rgba(114,0,0,0.2)]' : '' }}">
                            <img src="{{ $leader->gallery?->image_path ?? 'https://ui-avatars.com/api/?name='.urlencode($leader->name).'&color=7F9CF5&background=EBF4FF' }}" alt="{{ $leader->role }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110 group-hover:grayscale-0">
                            @if($leader->star)
                                <div class="absolute bottom-4 right-4 bg-elegant-red w-10 h-10 flex items-center justify-center text-white">
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            @else 
                                 <div class="absolute inset-0 border border-white/10 group-hover:border-elegant-red/50 transition duration-500"></div>
                            @endif
                        </div>
                        <h3 class="font-serif text-2xl text-white mb-1 group-hover:text-elegant-gold transition">{{ $leader->name }}</h3>
                        <p class="text-elegant-red text-xs font-bold uppercase tracking-widest">{{ $leader->role }}</p>
                    </div>
                @endforeach
            </div>

            <a href="{{ route('members.index') }}" class="inline-block px-10 py-4 border border-white/20 text-white font-bold text-xs uppercase tracking-[0.2em] hover:bg-white hover:text-black transition duration-300 animate-on-scroll">
                View All Team
            </a>

        </div>
    </section>

    </section>

    <!-- Sponsorship Section -->
    <section class="py-20 bg-elegant-black border-t border-white/5 overflow-hidden">
        <div class="container mx-auto px-6 mb-12 text-center animate-on-scroll">
            <h3 class="text-xs font-bold text-gray-500 tracking-[0.3em] uppercase">Supported By</h3>
        </div>
        
        <div class="relative flex overflow-x-hidden group">
            <div class="animate-marquee whitespace-nowrap flex space-x-16 items-center">
                @foreach(range(1, 4) as $i)
                    @foreach($sponsorships as $sponsor)
                        <div class="flex-shrink-0">
                            <img src="{{ asset($sponsor->content) }}" class="h-12 md:h-14 w-auto grayscale opacity-50 hover:opacity-100 hover:grayscale-0 transition duration-500 hover:scale-110">
                        </div>
                    @endforeach
                @endforeach
            </div>

            <!-- Left Fade -->
            <div class="absolute top-0 left-0 w-32 h-full bg-gradient-to-r from-elegant-black to-transparent z-10"></div>
            <!-- Right Fade -->
            <div class="absolute top-0 right-0 w-32 h-full bg-gradient-to-l from-elegant-black to-transparent z-10"></div>
        </div>

        @if($sponsorships->isEmpty())
             <div class="text-center text-gray-600 text-sm italic mt-8">
                Sponsors will appear here.
            </div>
        @endif
        
        <style>
            .animate-marquee {
                animation: marquee 40s linear infinite;
            }
            .group:hover .animate-marquee {
                animation-play-state: paused;
            }
            @keyframes marquee {
                0% { transform: translateX(0); }
                100% { transform: translateX(-50%); } 
            }
        </style>
    </section>

    <x-footer />



<div id="galleryModal" class="fixed inset-0 z-[100] hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-black/90 backdrop-blur-md"></div>
    
    <div class="relative bg-elegant-charcoal border border-white/10 w-full max-w-4xl rounded-sm shadow-2xl transform scale-95 transition-all duration-300 flex flex-col max-h-[90vh]">
        
        <div class="p-6 md:p-8 flex justify-between items-start border-b border-gray-800">
            <div>
                <span class="text-elegant-gold text-xs font-bold tracking-[0.2em] uppercase">Gallery Album</span>
                <h3 id="modalTitle" class="font-serif text-2xl md:text-3xl text-white mt-2">Title Here</h3>
                <p id="modalDesc" class="text-gray-500 text-sm mt-1">Description here</p>
            </div>
            <button onclick="closeModal()" class="text-gray-400 hover:text-elegant-red transition text-2xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="p-6 md:p-8 overflow-y-auto custom-scrollbar">
            
            <!-- Long Description Section -->
            <div id="modalLongDescContainer" class="mb-8 hidden">
                <h4 class="text-white font-serif text-lg mb-2">Detail Pencapaian</h4>
                <p id="modalLongDesc" class="text-gray-300 text-sm leading-relaxed whitespace-pre-line text-justify"></p>
                <div class="w-full h-[1px] bg-white/10 mt-6"></div>
            </div>

            <div id="modalImages" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            </div>
        </div>

    </div>
</div>


<script>
    // Data Dummy replaced by Database Data
    const achievementData = {!! json_encode($achievements->keyBy('id')->map(function($item) {
        return [
            'title' => $item->title,
            'desc' => $item->description,
            'long_desc' => $item->long_description,
            'images' => $item->galleries->pluck('image_path')
        ];
    })) !!};

    function openModal(id) {
        const data = achievementData[id];
        const modal = document.getElementById('galleryModal');
        const container = document.getElementById('modalImages');
        const longDescContainer = document.getElementById('modalLongDescContainer');
        
        // Set Text
        document.getElementById('modalTitle').innerText = data.title;
        document.getElementById('modalDesc').innerText = data.desc;
        
        // Handle Long Description
        if (data.long_desc) {
            document.getElementById('modalLongDesc').innerText = data.long_desc;
            longDescContainer.classList.remove('hidden');
        } else {
            longDescContainer.classList.add('hidden');
        }
        
        // Clear previous images
        container.innerHTML = '';

        // Inject new images
        if (data.images.length > 0) {
            data.images.forEach(imgUrl => {
                const imgDiv = document.createElement('div');
                imgDiv.className = 'overflow-hidden rounded-sm group relative h-48 md:h-64';
                imgDiv.innerHTML = `
                    <img src="${imgUrl}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                `;
                container.appendChild(imgDiv);
            });
        } else {
             container.innerHTML = '<p class="col-span-3 text-center text-gray-500 text-sm italic py-4">Tidak ada dokumentasi foto untuk pencapaian ini.</p>';
        }

        // Show Modal with Animation
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.querySelector('div.transform').classList.remove('scale-95');
            modal.querySelector('div.transform').classList.add('scale-100');
        }, 10);
    }

    function closeModal() {
        const modal = document.getElementById('galleryModal');
        modal.classList.add('opacity-0');
        modal.querySelector('div.transform').classList.remove('scale-100');
        modal.querySelector('div.transform').classList.add('scale-95');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    // Close on click outside
    document.getElementById('galleryModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Onscroll Animation Observer
    document.addEventListener('DOMContentLoaded', () => {
        const observerOptions = {
            threshold: 0.15, // Trigger when 15% of element is visible
            rootMargin: "0px"
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    entry.target.classList.remove('is-hidden');
                } else {
                    // Optional: Fade out when scrolling away
                    // entry.target.classList.remove('is-visible');
                    // entry.target.classList.add('is-hidden');
                    
                    // User requested fade in/fade out, so un-commenting this logic
                     if (entry.boundingClientRect.y > 0) { 
                        // Only fade out if scrolling down (element goes up)? 
                        // Or general fade out? "fade in/fadeout" usually implies bidirectional
                         entry.target.classList.remove('is-visible');
                         entry.target.classList.add('is-hidden');
                     }
                }
            });
        }, observerOptions);

        const activeElements = document.querySelectorAll('.animate-on-scroll');
        activeElements.forEach(el => observer.observe(el));
    });
</script>
</body>


</html>