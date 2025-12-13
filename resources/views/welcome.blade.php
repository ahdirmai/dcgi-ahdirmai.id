<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DC Genderang Irama - MAN 2 MODEL BANJARMASIN</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        elegant: {
                            black: '#050505',
                            charcoal: '#0F0F0F',
                            red: '#720000',       
                            redlight: '#A50000',
                            gold: '#C5A059',      
                            text: '#E0E0E0'
                        }
                    },
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>

    <style>
        /* Custom Utilities */
        .text-shadow { text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8); }
        .text-glow { text-shadow: 0 0 20px rgba(165, 0, 0, 0.5); }
        
        .glass-panel {
            background: rgba(20, 20, 20, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-up { animation: fadeInUp 1.2s ease-out forwards; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-400 { animation-delay: 0.4s; }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #050505; }
        ::-webkit-scrollbar-thumb { background: #720000; border-radius: 4px; }
    </style>
</head>
<body class="font-sans bg-elegant-black text-elegant-text antialiased selection:bg-elegant-red selection:text-white">

    <nav class="fixed w-full z-50 transition-all duration-500 bg-gradient-to-b from-black/90 to-transparent pt-4 pb-2">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="#" class="text-2xl font-serif font-bold tracking-widest text-white border-b border-elegant-red pb-1 hover:text-elegant-gold transition duration-300">
                G<span class="text-elegant-red">I</span>.
            </a>

            <div class="hidden md:flex space-x-12 text-xs font-medium tracking-[0.2em] uppercase text-gray-400">
                <a href="#about" class="hover:text-white transition duration-300 relative group">Tentang</a>
                <a href="#vision" class="hover:text-white transition duration-300 relative group">Visi</a>
                <a href="#gallery" class="hover:text-white transition duration-300 relative group">Galeri</a>
                <a href="#team" class="hover:text-white transition duration-300 relative group">Tim</a>
            </div>

            <a href="#contact" class="hidden md:block text-xs font-bold tracking-widest uppercase text-white border border-white/20 px-6 py-2 hover:bg-elegant-red hover:border-elegant-red transition duration-300 rounded-sm">
                Kontak
            </a>
            
             <div class="md:hidden text-white text-xl cursor-pointer">
                <i class="fa-solid fa-bars-staggered"></i>
            </div>
        </div>
    </nav>

    <header class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://picsum.photos/1920/1080?grayscale&blur=2" alt="Hero Background" class="w-full h-full object-cover opacity-60 scale-105 animate-[pulse_10s_ease-in-out_infinite]">
            <div class="absolute inset-0 bg-gradient-to-t from-elegant-black via-elegant-black/80 to-elegant-red/10 mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-elegant-black"></div>
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
                    <h2 class="font-serif text-4xl md:text-5xl text-white mb-8 leading-snug">
                        Seni, Disiplin, & <br> <span class="text-elegant-red italic">Kreativitas.</span>
                    </h2>
                    <div class="w-20 h-[2px] bg-gradient-to-r from-elegant-red to-transparent mb-8"></div>
                    
                    <p class="text-gray-400 leading-8 font-light mb-6 text-justify">
                        <span class="text-5xl float-left mr-3 mt-[-10px] font-serif text-elegant-gold">D</span>rum Corps Genderang Irama berdiri sejak tahun 2009 sebagai wujud dedikasi terhadap seni pertunjukan. Kami bukan sekadar barisan musisi; kami adalah perpaduan sinergis antara musik, visual, dan karakter.
                    </p>
                    <div class="grid grid-cols-2 gap-8 border-t border-white/10 pt-8">
                        <div>
                            <p class="font-serif text-3xl text-white">15<span class="text-elegant-red text-xl">+</span></p>
                            <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Tahun Berkarya</p>
                        </div>
                        <div>
                            <p class="font-serif text-3xl text-white">4<span class="text-elegant-red text-xl">+</span></p>
                            <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Gelar Bergengsi</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 order-1 lg:order-2 relative">
                    <div class="absolute -top-4 -right-4 w-full h-full border border-elegant-red/30 z-0"></div>
                    <div class="relative z-10 overflow-hidden shadow-[0_0_50px_rgba(0,0,0,0.5)]">
                        <img src="https://picsum.photos/600/800?grayscale" alt="Marching Art" class="w-full grayscale hover:grayscale-0 transition duration-1000 ease-in-out transform hover:scale-105">
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
            <div class="text-center mb-16">
                <span class="text-elegant-gold text-xs font-bold tracking-[0.3em] uppercase">Core Values</span>
                <h2 class="font-serif text-4xl text-white mt-4">Visi & Misi</h2>
            </div>
            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <div class="glass-panel p-10 rounded-sm hover:border-elegant-red/50 transition duration-500 group">
                    <h3 class="font-serif text-2xl text-white mb-6 italic group-hover:text-elegant-red transition">"Our Vision"</h3>
                    <p class="text-gray-300 font-light leading-relaxed italic border-l-2 border-elegant-gold pl-6">
                        Menjadi tim Drum Corps Genderang Irama yang berprestasi, profesional, dan berdaya saing tinggi.
                    </p>
                </div>
                <div class="glass-panel p-10 rounded-sm hover:border-elegant-red/50 transition duration-500">
                    <h3 class="font-serif text-2xl text-white mb-6 italic">"Our Mission"</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start group">
                            <span class="text-elegant-red mr-4 text-xs mt-1 group-hover:text-white transition">01</span>
                            <p class="text-gray-400 font-light text-sm leading-relaxed">Mengembangkan potensi anggota dalam bidang musik.</p>
                        </li>
                        <li class="flex items-start group">
                            <span class="text-elegant-red mr-4 text-xs mt-1 group-hover:text-white transition">02</span>
                            <p class="text-gray-400 font-light text-sm leading-relaxed">Menanamkan nilai disiplin dan tanggung jawab.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="gallery" class="py-32 bg-elegant-black relative">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="font-serif text-4xl text-white">Visual <span class="italic text-elegant-red">Art.</span></h2>
                    <p class="text-gray-500 text-sm mt-2 tracking-wide">Momen terbaik dalam setiap detak.</p>
                </div>
                <a href="#" class="hidden md:block text-xs font-bold text-elegant-gold tracking-[0.2em] uppercase hover:text-white transition">View Gallery <i class="fa-solid fa-arrow-right ml-2"></i></a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-4 h-auto md:h-[600px]">
                
                <div class="md:col-span-2 md:row-span-2 group relative overflow-hidden rounded-sm cursor-pointer">
                    <img src="https://picsum.photos/800/800?grayscale&random=1" alt="Show" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 group-hover:grayscale-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition duration-500 flex items-end p-6">
                        <span class="text-white font-serif italic text-xl">Grand Prix Final</span>
                    </div>
                </div>

                <div class="md:col-span-1 md:row-span-2 group relative overflow-hidden rounded-sm cursor-pointer">
                    <img src="https://picsum.photos/400/800?grayscale&random=2" alt="Brass" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 group-hover:grayscale-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition duration-500 flex items-end p-6">
                        <span class="text-white font-serif italic text-xl">Brassline</span>
                    </div>
                </div>

                <div class="md:col-span-1 md:row-span-1 group relative overflow-hidden rounded-sm cursor-pointer">
                    <img src="https://picsum.photos/400/400?grayscale&random=3" alt="Drum" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 group-hover:grayscale-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition duration-500 flex items-end p-6">
                        <span class="text-white font-serif italic text-xl">Percussion</span>
                    </div>
                </div>

                <div class="md:col-span-1 md:row-span-1 group relative overflow-hidden rounded-sm cursor-pointer">
                    <img src="https://picsum.photos/400/400?grayscale&random=4" alt="Guard" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 group-hover:grayscale-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition duration-500 flex items-end p-6">
                        <span class="text-white font-serif italic text-xl">Color Guard</span>
                    </div>
                </div>

            </div>
            
            <div class="mt-8 md:hidden text-center">
                <a href="#" class="text-xs font-bold text-elegant-gold tracking-[0.2em] uppercase">View Gallery</a>
            </div>
        </div>
    </section>

    <section id="achievements" class="py-32 bg-elegant-charcoal overflow-hidden border-t border-gray-900">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-20 pb-6">
            <h2 class="font-serif text-4xl md:text-5xl text-white">Jejak<br>Prestasi</h2>
            <p class="text-gray-500 text-sm mt-4 md:mt-0 max-w-xs text-right">Klik pada pencapaian untuk melihat dokumentasi foto.</p>
        </div>

        <div class="relative">
            <div class="absolute left-4 md:left-1/2 transform md:-translate-x-1/2 h-full w-[1px] bg-gradient-to-b from-elegant-red via-gray-800 to-transparent"></div>
            <div class="space-y-16">
                
                <div onclick="openModal('2017')" class="relative flex flex-col md:flex-row items-center w-full group cursor-pointer">
                    <div class="w-full md:w-1/2 md:pr-12 pl-12 md:pl-0 md:text-right transition duration-300 group-hover:-translate-x-2">
                        <span class="text-elegant-gold font-bold tracking-widest text-sm">2017</span>
                        <h3 class="font-serif text-2xl text-white mt-1 group-hover:text-elegant-red transition">2nd Runner Up <i class="fa-solid fa-camera text-xs ml-2 opacity-0 group-hover:opacity-100 transition"></i></h3>
                        <p class="text-gray-500 text-sm mt-2">JOMC (International Level)</p>
                    </div>
                    <div class="absolute left-4 md:left-1/2 transform -translate-x-1/2 w-3 h-3 bg-black border border-elegant-red rounded-full z-10 group-hover:scale-150 group-hover:bg-elegant-red transition duration-300 shadow-[0_0_10px_rgba(216,0,50,0.5)]"></div>
                    <div class="hidden md:block w-1/2"></div>
                </div>

                <div onclick="openModal('2020')" class="relative flex flex-col md:flex-row items-center w-full group cursor-pointer">
                    <div class="hidden md:block w-1/2"></div>
                    <div class="absolute left-4 md:left-1/2 transform -translate-x-1/2 w-3 h-3 bg-black border border-white rounded-full z-10 group-hover:scale-150 group-hover:bg-white transition duration-300"></div>
                    <div class="w-full md:w-1/2 pl-12 transition duration-300 group-hover:translate-x-2">
                        <span class="text-gray-400 font-bold tracking-widest text-sm">2020</span>
                        <h3 class="font-serif text-2xl text-white mt-1 group-hover:text-elegant-red transition">1st Brass Battle <i class="fa-solid fa-camera text-xs ml-2 opacity-0 group-hover:opacity-100 transition"></i></h3>
                        <p class="text-gray-500 text-sm mt-2">Borneo Marching Day</p>
                    </div>
                </div>

                <div onclick="openModal('2025')" class="relative flex flex-col md:flex-row items-center w-full group cursor-pointer">
                    <div class="w-full md:w-1/2 md:pr-12 pl-12 md:pl-0 md:text-right transition duration-300 group-hover:-translate-x-2">
                        <span class="text-elegant-gold font-bold tracking-widest text-sm">2025</span>
                        <h3 class="font-serif text-2xl text-white mt-1 group-hover:text-elegant-red transition">2nd Place Winner <i class="fa-solid fa-camera text-xs ml-2 opacity-0 group-hover:opacity-100 transition"></i></h3>
                        <p class="text-gray-500 text-sm mt-2">Konser Borneo Marching Day</p>
                    </div>
                    <div class="absolute left-4 md:left-1/2 transform -translate-x-1/2 w-3 h-3 bg-black border border-elegant-red rounded-full z-10 group-hover:scale-150 group-hover:bg-elegant-red transition duration-300 shadow-[0_0_10px_rgba(216,0,50,0.5)]"></div>
                    <div class="hidden md:block w-1/2"></div>
                </div>

                <div onclick="openModal('2026')" class="relative flex flex-col md:flex-row items-center w-full group cursor-pointer">
                    <div class="hidden md:block w-1/2"></div>
                    <div class="absolute left-4 md:left-1/2 transform -translate-x-1/2 w-3 h-3 bg-black border border-white rounded-full z-10 group-hover:scale-150 group-hover:bg-white transition duration-300"></div>
                    <div class="w-full md:w-1/2 pl-12 transition duration-300 group-hover:translate-x-2">
                        <span class="text-gray-400 font-bold tracking-widest text-sm">2026</span>
                        <h3 class="font-serif text-2xl text-white mt-1 group-hover:text-elegant-red transition">2nd Winner <i class="fa-solid fa-camera text-xs ml-2 opacity-0 group-hover:opacity-100 transition"></i></h3>
                        <p class="text-gray-500 text-sm mt-2">Wali Kota Cup</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

    <section id="team" class="py-32 bg-elegant-black">
        <div class="container mx-auto px-6 text-center">
            
            <span class="text-elegant-gold text-xs font-bold tracking-[0.3em] uppercase">Leadership</span>
            <h2 class="font-serif text-4xl text-white mt-4 mb-16">The Minds Behind</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-5xl mx-auto mb-16">
                
                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden mb-6 aspect-[3/4]">
                        <img src="https://picsum.photos/400/500?grayscale&random=10" alt="Director" class="w-full h-full object-cover transition duration-500 group-hover:scale-105 group-hover:grayscale-0">
                        <div class="absolute inset-0 border border-white/10 group-hover:border-elegant-red/50 transition duration-500"></div>
                    </div>
                    <h3 class="font-serif text-2xl text-white mb-1">John Doe</h3>
                    <p class="text-elegant-red text-xs font-bold uppercase tracking-widest">Band Director</p>
                </div>

                <div class="group cursor-pointer md:-mt-8">
                    <div class="relative overflow-hidden mb-6 aspect-[3/4] shadow-[0_0_30px_rgba(114,0,0,0.2)]">
                        <img src="https://picsum.photos/400/500?grayscale&random=11" alt="Field Commander" class="w-full h-full object-cover transition duration-500 group-hover:scale-105 group-hover:grayscale-0">
                        <div class="absolute bottom-4 right-4 bg-elegant-red w-10 h-10 flex items-center justify-center text-white">
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <h3 class="font-serif text-2xl text-white mb-1">Jane Smith</h3>
                    <p class="text-elegant-red text-xs font-bold uppercase tracking-widest">Field Commander</p>
                </div>

                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden mb-6 aspect-[3/4]">
                        <img src="https://picsum.photos/400/500?grayscale&random=12" alt="Chairman" class="w-full h-full object-cover transition duration-500 group-hover:scale-105 group-hover:grayscale-0">
                        <div class="absolute inset-0 border border-white/10 group-hover:border-elegant-red/50 transition duration-500"></div>
                    </div>
                    <h3 class="font-serif text-2xl text-white mb-1">Michael Tan</h3>
                    <p class="text-elegant-red text-xs font-bold uppercase tracking-widest">Corps Commander</p>
                </div>

            </div>

            <a href="#" class="inline-block px-10 py-4 border border-white/20 text-white font-bold text-xs uppercase tracking-[0.2em] hover:bg-white hover:text-black transition duration-300">
                View All Team
            </a>

        </div>
    </section>

    <footer id="contact" class="bg-black text-gray-400 py-20 border-t border-gray-900">
        <div class="container mx-auto px-6 flex flex-col items-center text-center">
            <h2 class="font-serif text-3xl text-white mb-8">DC Genderang Irama.</h2>
            <div class="flex space-x-8 mb-10">
                <a href="#" class="hover:text-elegant-red transition transform hover:-translate-y-1"><i class="fa-brands fa-instagram text-xl"></i></a>
                <a href="#" class="hover:text-elegant-red transition transform hover:-translate-y-1"><i class="fa-brands fa-tiktok text-xl"></i></a>
                <a href="#" class="hover:text-elegant-red transition transform hover:-translate-y-1"><i class="fa-brands fa-youtube text-xl"></i></a>
            </div>
            <p class="text-xs tracking-widest uppercase mb-2">Join The Legacy</p>
            <p class="font-serif text-xl text-white mb-8 hover:text-elegant-red transition cursor-pointer">join@genderangirama.id</p>
            <p class="text-[10px] text-gray-700 uppercase tracking-widest">
                &copy; 2025 Drum Corps Genderang Irama. All Rights Reserved.
            </p>
        </div>
    </footer>



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
            <div id="modalImages" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                </div>
        </div>

    </div>
</div>


<script>
    // Data Dummy untuk setiap prestasi (Bisa diganti dengan foto asli nanti)
    const achievementData = {
        '2017': {
            title: "2nd Runner Up - JOMC 2017",
            desc: "Jember Open Marching Competition - International Level",
            images: [
                "https://picsum.photos/600/400?grayscale&random=20",
                "https://picsum.photos/600/400?grayscale&random=21",
                "https://picsum.photos/600/400?grayscale&random=22"
            ]
        },
        '2020': {
            title: "1st Brass Battle - BMD 2020",
            desc: "Borneo Marching Day - Brassline Category",
            images: [
                "https://picsum.photos/600/400?grayscale&random=23",
                "https://picsum.photos/600/400?grayscale&random=24",
                "https://picsum.photos/600/400?grayscale&random=25"
            ]
        },
        '2025': {
            title: "2nd Place Winner - BMD 2025",
            desc: "Konser Borneo Marching Day - Full Band",
            images: [
                "https://picsum.photos/600/400?grayscale&random=26",
                "https://picsum.photos/600/400?grayscale&random=27",
                "https://picsum.photos/600/400?grayscale&random=28"
            ]
        },
        '2026': {
            title: "2nd Winner - Wali Kota Cup",
            desc: "Kejuaraan Tingkat Kota - Display Category",
            images: [
                "https://picsum.photos/600/400?grayscale&random=29",
                "https://picsum.photos/600/400?grayscale&random=30",
                "https://picsum.photos/600/400?grayscale&random=31"
            ]
        }
    };

    function openModal(year) {
        const data = achievementData[year];
        const modal = document.getElementById('galleryModal');
        const container = document.getElementById('modalImages');
        
        // Set Text
        document.getElementById('modalTitle').innerText = data.title;
        document.getElementById('modalDesc').innerText = data.desc;
        
        // Clear previous images
        container.innerHTML = '';

        // Inject new images
        data.images.forEach(imgUrl => {
            const imgDiv = document.createElement('div');
            imgDiv.className = 'overflow-hidden rounded-sm group relative h-48 md:h-64';
            imgDiv.innerHTML = `
                <img src="${imgUrl}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
            `;
            container.appendChild(imgDiv);
        });

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
</script>
</body>


</html>