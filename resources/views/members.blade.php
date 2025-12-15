<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tim Kami - DC Genderang Irama</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-elegant-black font-sans text-elegant-text antialiased selection:bg-elegant-red selection:text-white">

    <!-- Navbar -->
    <x-navbar />

    <!-- Header -->
    <header class="relative h-[50vh] min-h-[400px] flex items-center justify-center overflow-hidden">
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
        
        <div class="relative z-20 text-center px-4">
            <h1 class="font-serif text-4xl md:text-6xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-elegant-gold to-yellow-200 mb-4 animate-fade-up">Tim Kami</h1>
            <p class="text-gray-300 text-lg max-w-2xl mx-auto animate-fade-up delay-200 font-light tracking-wide">Individu-individu berdedikasi di balik harmoni DC Genderang Irama.</p>
        </div>
    </header>

    <!-- Leadership Section -->
    <section class="py-20 bg-elegant-black">
        <div class="container mx-auto px-6 text-center">
            
            <span class="text-elegant-gold text-xs font-bold tracking-[0.3em] uppercase">Leadership</span>
            <h2 class="font-serif text-4xl text-white mt-4 mb-16">The Minds Behind</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-5xl mx-auto mb-16">
                @foreach($leadership as $index => $leader)
                    <div onclick="filterBySection('{{ $leader->section }}')" class="group cursor-pointer {{ $leader->star ? 'md:-mt-8' : '' }} transition-all duration-300 hover:transform hover:scale-105">
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

        </div>
    </section>

     <!-- Members List Section -->
    <section class="py-20 bg-elegant-charcoal border-t border-white/5">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="font-serif text-3xl text-white">Anggota Tim</h2>
                <div class="w-16 h-1 bg-elegant-gold mx-auto mt-4"></div>
            </div>

            <div id="filterControls" class="text-center mb-8 hidden">
                <p class="text-gray-400 text-sm mb-4">Menampilkan Section: <span id="currentFilter" class="text-elegant-gold font-bold"></span></p>
                <button onclick="resetFilter()" class="px-6 py-2 border border-white/20 text-white text-xs uppercase tracking-widest hover:bg-elegant-red hover:border-elegant-red transition duration-300">
                    Show All Members
                </button>
            </div>

            <div id="membersGrid" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @foreach($members as $member)
                    <div class="member-item bg-black/30 p-4 rounded-sm border border-white/5 hover:border-elegant-red/30 transition duration-300 text-center group" data-section="{{ $member->section }}">
                        <div class="w-20 h-20 mx-auto mb-4 rounded-full overflow-hidden border-2 border-white/10 group-hover:border-elegant-red transition">
                             <img src="{{ $member->gallery?->image_path ?? 'https://ui-avatars.com/api/?name='.urlencode($member->name).'&color=7F9CF5&background=EBF4FF' }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                        </div>
                        <h4 class="text-white font-medium text-sm group-hover:text-elegant-gold transition">{{ $member->name }}</h4>
                        <p class="text-gray-500 text-xs mt-1">{{ $member->role }}</p>
                    </div>
                @endforeach
            </div>

            @if($members->isEmpty())
                <p class="text-center text-gray-500">Data anggota belum tersedia.</p>
            @endif

        </div>
    </section>

    <!-- Footer -->
    <x-footer />

    <script>
        function filterBySection(section) {
            if(!section) return; // Ignore if no section
            
            const items = document.querySelectorAll('.member-item');
            let count = 0;
            
            items.forEach(item => {
                if(item.dataset.section === section) {
                    item.classList.remove('hidden');
                    count++;
                } else {
                    item.classList.add('hidden');
                }
            });

            // Show controls and update text
            const controls = document.getElementById('filterControls');
            const filterText = document.getElementById('currentFilter');
            
            controls.classList.remove('hidden');
            filterText.innerText = section;

            // Scroll to members section
            document.getElementById('membersGrid').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        function resetFilter() {
            const items = document.querySelectorAll('.member-item');
            items.forEach(item => item.classList.remove('hidden'));
            
            document.getElementById('filterControls').classList.add('hidden');
        }
    </script>
</body>
</html>
