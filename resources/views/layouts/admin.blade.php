<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-elegant-black text-gray-300">
        
        @include('layouts.sidebar')

        <div class="p-4 sm:ml-64 min-h-screen">
             <!-- Mobile Header -->
             <div class="sm:hidden flex items-center justify-between mb-4 p-4 bg-elegant-charcoal rounded-sm border border-white/10">
                 <span class="text-white font-serif font-bold">GI Admin</span>
                <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-400 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <i class="fa-solid fa-bars text-xl"></i>
                 </button>
             </div>

            <main class="mt-4">
                 @if (isset($header))
                    <div class="mb-8 border-b border-white/5 pb-4 flex justify-between items-end">
                        <h2 class="font-serif text-3xl text-white font-semibold">
                            {{ $header }}
                        </h2>
                        <!-- Breadcrumb or extra actions could go here -->
                    </div>
                @endif
                
                <!-- Flash Messages -->
                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-400 rounded-sm bg-green-900/20 border border-green-900/50" role="alert">
                         <span class="font-medium">Success!</span> {{ session('success') }}
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>

        <script>
            // Simple mobile sidebar toggle if Flowbite is not used/available
            document.addEventListener('DOMContentLoaded', () => {
                const toggleBtn = document.querySelector('[data-drawer-toggle]');
                const sidebar = document.querySelector('aside');
                const backdrop = document.createElement('div');
                
                if(toggleBtn) {
                     backdrop.className = 'fixed inset-0 bg-black/50 z-30 hidden sm:hidden';
                     document.body.appendChild(backdrop);

                    toggleBtn.addEventListener('click', () => {
                        sidebar.classList.toggle('-translate-x-full');
                        backdrop.classList.toggle('hidden');
                    });
                    
                    backdrop.addEventListener('click', () => {
                         sidebar.classList.add('-translate-x-full');
                         backdrop.classList.add('hidden');
                    });
                }
            });
        </script>
    </body>
</html>
