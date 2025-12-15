<footer id="contact" class="bg-black text-gray-400 py-20 border-t border-gray-900">
    <div class="container mx-auto px-6 flex flex-col items-center text-center">
        <h2 class="font-serif text-3xl text-white mb-8">DC Genderang Irama.</h2>
        <div class="flex space-x-8 mb-10">
            @if(isset($socials['instagram']))
                <a href="{{ $socials['instagram']->content }}" target="_blank" class="hover:text-elegant-red transition transform hover:-translate-y-1"><i class="fa-brands fa-instagram text-xl"></i></a>
            @endif
            @if(isset($socials['tiktok']))
                    <a href="{{ $socials['tiktok']->content }}" target="_blank" class="hover:text-elegant-red transition transform hover:-translate-y-1"><i class="fa-brands fa-tiktok text-xl"></i></a>
            @endif
            @if(isset($socials['youtube']))
                <a href="{{ $socials['youtube']->content }}" target="_blank" class="hover:text-elegant-red transition transform hover:-translate-y-1"><i class="fa-brands fa-youtube text-xl"></i></a>
            @endif
        </div>
        <p class="text-xs tracking-widest uppercase mb-2">Join The Legacy</p>
        <p class="font-serif text-xl text-white mb-8 hover:text-elegant-red transition cursor-pointer">
            {{ $socials['email']->content ?? 'join@genderangirama.id' }}
        </p>
        <p class="text-[10px] text-gray-700 uppercase tracking-widest">
            &copy; {{ date('Y') }} Drum Corps Genderang Irama - Build by <a href="https://ahdirmai.id" target="_blank" class="text-elegant-red hover:text-elegant-red transition">Ahdirmai</a>. All Rights Reserved.
        </p>
    </div>
</footer>
