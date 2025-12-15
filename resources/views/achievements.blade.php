<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Primary Meta Tags -->
    <title>Jejak Prestasi - DC Genderang Irama</title>
    <meta name="title" content="Jejak Prestasi - DC Genderang Irama">
    <meta name="description" content="Kumpulan prestasi dan penghargaan yang telah diraih oleh Drum Corps Genderang Irama (DCGI) MAN 2 BANJARMASIN.">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

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

    <!-- Header Section -->
    <header class="relative h-[60vh] flex items-center justify-center overflow-hidden">
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
            <h1 class="animate-fade-up font-serif text-5xl md:text-7xl text-white leading-tight mb-4">
                Jejak <span class="italic text-elegant-red">Prestasi</span>
            </h1>
            <p class="animate-fade-up delay-200 text-gray-400 text-lg font-light tracking-wide">
                Dedikasi, Kerja Keras, dan Kebanggaan.
            </p>
        </div>
    </header>

    <!-- Achievements Section -->
    <section class="py-20 bg-elegant-charcoal overflow-hidden border-t border-gray-900">
        <div class="container mx-auto px-6">
            <div class="relative">
                <div class="absolute left-4 md:left-1/2 transform md:-translate-x-1/2 h-full w-[1px] bg-gradient-to-b from-elegant-red via-gray-800 to-transparent"></div>
                <div class="space-y-16">
                    
                    @foreach($achievements as $index => $achievement)
                        @php
                           $isLeft = $index % 2 == 0;
                        @endphp
                        <div onclick="openModal('{{ $achievement->id }}')" class="relative flex flex-col md:flex-row items-center w-full group cursor-pointer animate-on-scroll">
                             @if($isLeft)
                                <div class="w-full md:w-1/2 md:pr-12 pl-12 md:pl-0 md:text-right transition duration-300 group-hover:-translate-x-2">
                                    <span class="text-elegant-gold font-bold tracking-widest text-sm">{{ $achievement->year }}</span>
                                    <h3 class="font-serif text-2xl text-white mt-1 group-hover:text-elegant-red transition">{{ $achievement->title }} <i class="fa-solid fa-camera text-xs ml-2 opacity-0 group-hover:opacity-100 transition"></i></h3>
                                    <p class="text-gray-500 text-sm mt-2 line-clamp-2">{{ $achievement->description }}</p>
                                </div>
                                <div class="absolute left-4 md:left-1/2 transform -translate-x-1/2 w-3 h-3 bg-black border border-elegant-red rounded-full z-10 group-hover:scale-150 group-hover:bg-elegant-red transition duration-300 shadow-[0_0_10px_rgba(216,0,50,0.5)]"></div>
                                <div class="hidden md:block w-1/2"></div>
                            @else
                                <div class="hidden md:block w-1/2"></div>
                                <div class="absolute left-4 md:left-1/2 transform -translate-x-1/2 w-3 h-3 bg-black border border-white rounded-full z-10 group-hover:scale-150 group-hover:bg-white transition duration-300"></div>
                                <div class="w-full md:w-1/2 pl-12 transition duration-300 group-hover:translate-x-2">
                                    <span class="text-gray-400 font-bold tracking-widest text-sm">{{ $achievement->year }}</span>
                                    <h3 class="font-serif text-2xl text-white mt-1 group-hover:text-elegant-red transition">{{ $achievement->title }} <i class="fa-solid fa-camera text-xs ml-2 opacity-0 group-hover:opacity-100 transition"></i></h3>
                                    <p class="text-gray-500 text-sm mt-2 line-clamp-2">{{ $achievement->description }}</p>
                                </div>
                            @endif
                        </div>
                    @endforeach

                    @if($achievements->isEmpty())
                        <div class="text-center text-gray-500 py-12">
                            Belum ada data prestasi.
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>

    <x-footer />

    <!-- Gallery Modal -->
    <div id="galleryModal" class="fixed inset-0 z-[100] hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/90 backdrop-blur-md"></div>
        
        <div class="relative bg-elegant-charcoal border border-white/10 w-full max-w-4xl rounded-sm shadow-2xl transform scale-95 transition-all duration-300 flex flex-col max-h-[90vh]">
            
            <div class="p-6 md:p-8 flex justify-between items-start border-b border-gray-800">
                <div>
                    <span class="text-elegant-gold text-xs font-bold tracking-[0.2em] uppercase">Gallery Album</span>
                    <h3 id="modalTitle" class="font-serif text-2xl md:text-3xl text-white mt-2">Title Here</h3>
                    <p id="modalDesc" class="text-gray-400 text-sm mt-1 italic">Short Description</p>
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
                         if (entry.boundingClientRect.y > 0) { 
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
