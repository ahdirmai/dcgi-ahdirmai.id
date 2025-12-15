<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - DC Genderang Irama</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-elegant-black font-sans text-elegant-text antialiased selection:bg-elegant-red selection:text-white">

    <!-- Navbar (Same as Welcome) -->
    <x-navbar />

    <!-- Header -->
    <header class="relative h-[40vh] min-h-[300px] flex items-center justify-center overflow-hidden">
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
            <h1 class="font-serif text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-elegant-gold to-yellow-200 mb-4 animate-fade-up">Galeri Kami</h1>
            <p class="text-gray-300 text-lg max-w-2xl mx-auto animate-fade-up delay-200">Momen-momen berharga dari perjalanan kami dalam berkarya dan berprestasi.</p>
        </div>
    </header>

    <!-- Gallery Grid -->
    <section class="py-20 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($albums as $album)
                    <div onclick="openLightbox({{ $loop->index }})" class="group relative overflow-hidden rounded-xl aspect-[4/3] cursor-pointer">
                        <img src="{{ $album->cover_image_path }}" alt="{{ $album->title }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-80 transition-opacity duration-300"></div>
                        
                        <div class="absolute bottom-0 left-0 right-0 p-6 translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                            <h3 class="font-serif text-2xl font-bold text-white mb-2">{{ $album->title }}</h3>
                            <p class="text-gray-300 text-sm line-clamp-2">{{ $album->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($albums->isEmpty())
                <div class="text-center py-12">
                     <p class="text-gray-400">Belum ada album galeri.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 z-50 bg-black/95 hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4">
        
        <!-- Close Button -->
        <button onclick="closeLightbox()" class="absolute top-6 right-6 text-gray-400 hover:text-white transition z-50">
            <i class="fa-solid fa-xmark text-4xl"></i>
        </button>

        <!-- Navigation Buttons -->
        <button onclick="prevImage()" class="absolute left-6 text-white hover:text-elegant-gold transition z-50 hidden md:block">
            <i class="fa-solid fa-chevron-left text-4xl"></i>
        </button>
        <button onclick="nextImage()" class="absolute right-6 text-white hover:text-elegant-gold transition z-50 hidden md:block">
            <i class="fa-solid fa-chevron-right text-4xl"></i>
        </button>

        <!-- Main Image -->
        <div class="relative max-w-7xl max-h-[90vh] w-full flex flex-col items-center">
             <img id="lightbox-image" src="" alt="" class="max-h-[80vh] w-auto object-contain rounded-md shadow-2xl">
             <div class="mt-4 text-center">
                 <h3 id="lightbox-title" class="font-serif text-2xl text-white font-bold mb-1"></h3>
                 <p id="lightbox-description" class="text-gray-400 text-sm"></p>
             </div>
        </div>
    </div>

    <script>
        const albums = @json($albums);
        let currentIndex = 0;
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightbox-image');
        const lightboxTitle = document.getElementById('lightbox-title');
        const lightboxDescription = document.getElementById('lightbox-description');

        function openLightbox(index) {
            currentIndex = index;
            updateLightboxContent();
            lightbox.classList.remove('hidden');
            // Small delay to allow display:block to apply before opacity transition
            setTimeout(() => {
                lightbox.classList.remove('opacity-0');
            }, 10);
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        }

        function closeLightbox() {
            lightbox.classList.add('opacity-0');
            setTimeout(() => {
                lightbox.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }

        function updateLightboxContent() {
            const album = albums[currentIndex];
            lightboxImage.src = album.cover_image_path;
            lightboxTitle.textContent = album.title;
            lightboxDescription.textContent = album.description;
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % albums.length;
            updateLightboxContent();
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + albums.length) % albums.length;
            updateLightboxContent();
        }

        // Close on escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") closeLightbox();
            if (event.key === "ArrowRight") nextImage();
            if (event.key === "ArrowLeft") prevImage();
        });

        // Close when clicking outside image
        lightbox.addEventListener('click', function(event) {
            if (event.target === lightbox) {
                closeLightbox();
            }
        });
    </script>

    <!-- Footer -->
    <x-footer />

</body>
</html>
