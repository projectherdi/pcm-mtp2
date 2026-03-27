<nav x-data="{ atTop: true, mobileMenu: false }" 
     @scroll.window="atTop = (window.pageYOffset < 50)"
     :class="atTop ? 'bg-transparent py-6' : 'bg-teal-950 shadow-2xl py-3'"
     class="fixed w-full top-0 left-0 z-[100] transition-all duration-500">
    
    @php
        // Daftar menu agar sinkron antara desktop dan mobile
        $navLinks = [
            'Beranda' => '/',
            'Profil'  => 'profil*',
            'Kabar'   => 'berita*',
            'Galeri'  => 'gallery*',
        ];
    @endphp

    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
        
        {{-- Logo --}}
        <a href="/" class="flex items-center space-x-3 z-[110]">
            <div class="bg-white p-1.5 rounded-xl shadow-lg">
                <img src="{{ asset('logo.png') }}" class="h-8 w-auto" alt="Logo">
            </div>
            <div class="flex flex-col">
                <span class="text-white text-lg font-black italic leading-none uppercase tracking-tighter">
                    PCM <span class="text-yellow-400">Martapura 2</span>
                </span>
            </div>
        </a>

        {{-- Desktop Navigation --}}
        <div class="hidden md:flex items-center space-x-8">
            @foreach($navLinks as $label => $path)
                @php
                    // Logika deteksi halaman aktif
                    $isActive = ($path === '/' && Request::is('/')) || ($path !== '/' && Request::is($path));
                @endphp
                
                <a href="{{ url(str_replace('*', '', $path)) }}" 
                   class="relative text-sm font-bold transition-all duration-300 group
                         {{ $isActive ? 'text-yellow-400' : 'text-white hover:text-yellow-400' }}">
                    
                    {{ $label }}
                    
                    {{-- Garis bawah tipis untuk indikator aktif --}}
                    <span class="absolute -bottom-1 left-0 h-0.5 bg-yellow-400 transition-all duration-300
                          {{ $isActive ? 'w-full' : 'w-0 group-hover:w-full' }}">
                    </span>
                </a>
            @endforeach

            <a href="/contact" class="px-5 py-2.5 bg-yellow-400 hover:bg-white text-teal-950 font-black text-[10px] uppercase rounded-xl shadow-lg transition-all duration-300">
                Hubungi Kami
            </a>
        </div>

        {{-- Hamburger Button --}}
        <button type="button" 
                @click="mobileMenu = !mobileMenu" 
                class="md:hidden relative z-[110] p-2 text-white focus:outline-none">
            <div class="w-6 h-5 relative flex flex-col justify-between overflow-hidden">
                <span :class="mobileMenu ? 'rotate-45 translate-y-2' : ''" class="w-full h-0.5 bg-white transition-all duration-300 transform origin-left"></span>
                <span :class="mobileMenu ? '-translate-x-full opacity-0' : ''" class="w-full h-0.5 bg-white transition-all duration-300"></span>
                <span :class="mobileMenu ? '-rotate-45 -translate-y-2' : ''" class="w-full h-0.5 bg-white transition-all duration-300 transform origin-left"></span>
            </div>
        </button>
    </div>

    {{-- Overlay Menu Mobile --}}
    <div x-show="mobileMenu" 
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-x-full"
         x-transition:enter-end="opacity-100 translate-x-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-x-0"
         x-transition:leave-end="opacity-0 translate-x-full"
         class="fixed inset-0 z-[105] md:hidden bg-teal-950 flex flex-col items-center justify-center space-y-8 text-center">
        
        @foreach($navLinks as $label => $path)
            @php
                $isActive = ($path === '/' && Request::is('/')) || ($path !== '/' && Request::is($path));
            @endphp
            <a href="{{ url(str_replace('*', '', $path)) }}" 
               @click="mobileMenu = false" 
               class="text-2xl font-black uppercase tracking-widest transition-colors duration-300
                     {{ $isActive ? 'text-yellow-400' : 'text-white hover:text-yellow-400' }}">
                {{ $label }}
            </a>
        @endforeach
        
        <div class="pt-10">
            <a href="#kontak" @click="mobileMenu = false" class="px-10 py-4 bg-yellow-400 text-teal-950 font-black uppercase rounded-2xl shadow-2xl transition-all">
                Hubungi Kami
            </a>
        </div>
    </div>
</nav>