<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DC Genderang Irama</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="font-sans bg-elegant-black text-white antialiased selection:bg-elegant-red selection:text-white h-screen flex items-center justify-center relative overflow-hidden">

    <!-- Background Elements -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-br from-black via-elegant-black to-black opacity-90"></div>
        <!-- Decorative Glow -->
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-elegant-red/20 blur-[120px] rounded-full pointer-events-none"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-elegant-gold/10 blur-[120px] rounded-full pointer-events-none"></div>
    </div>

    <!-- Login Container -->
    <div class="relative z-10 w-full max-w-md p-8">
        
        <!-- Logo / Header -->
        <div class="text-center mb-10">
            <a href="/" class="inline-block mb-6 group">
                <span class="text-3xl font-serif font-bold tracking-widest text-white border-b border-elegant-red pb-1 group-hover:text-elegant-gold transition duration-300">
                    G<span class="text-elegant-red">I</span>.
                </span>
            </a>
            <h2 class="font-serif text-2xl text-white">Welcome Back</h2>
            <p class="text-gray-500 text-xs tracking-widest uppercase mt-2">Sign in to continue</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-center text-sm font-medium text-green-500" :status="session('status')" />

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-900/20 border border-red-500/50 rounded-sm">
                <div class="font-medium text-red-500 text-sm mb-1">{{ __('Whoops! Something went wrong.') }}</div>
                <ul class="text-xs text-red-400 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-xs font-bold text-gray-500 tracking-widest uppercase mb-2">Email Address</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                        class="block w-full pl-10 pr-3 py-3 bg-white/5 border border-white/10 text-white placeholder-gray-600 focus:outline-none focus:border-elegant-gold focus:ring-1 focus:ring-elegant-gold rounded-sm transition duration-300 text-sm"
                        placeholder="name@example.com">
                </div>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-xs font-bold text-gray-500 tracking-widest uppercase mb-2">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="block w-full pl-10 pr-3 py-3 bg-white/5 border border-white/10 text-white placeholder-gray-600 focus:outline-none focus:border-elegant-gold focus:ring-1 focus:ring-elegant-gold rounded-sm transition duration-300 text-sm"
                        placeholder="Enter your password">
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-600 bg-white/5 text-elegant-red shadow-sm focus:ring-elegant-red/50 group-hover:border-elegant-gold transition duration-300">
                    <span class="ms-2 text-sm text-gray-400 group-hover:text-gray-300 transition duration-300">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-sm shadow-sm text-sm font-bold tracking-widest uppercase text-white bg-elegant-red hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300 transform hover:-translate-y-1">
                Log in
            </button>
            
            <div class="text-center mt-6">
                <a href="/" class="text-xs text-gray-600 hover:text-elegant-gold transition duration-300 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-arrow-left"></i> Back to Home
                </a>
            </div>
        </form>
    </div>

</body>
</html>
