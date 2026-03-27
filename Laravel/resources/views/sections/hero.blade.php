<section class="relative w-full h-screen flex items-center overflow-hidden font-sans">
    
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('hero-bg.jpg') }}" 
             class="w-full h-full object-cover" 
             alt="Background Muhammadiyah">
        
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 via-blue-900/60 to-transparent"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto pt-10 px-8 lg:px-8 w-full">
        <div class="max-w-2xl">
            
            <div class="inline-flex items-center space-x-2 bg-white/10 backdrop-blur-md border border-white/20 px-4 py-2 rounded-full mb-6">
                <span class="flex h-2 w-2 rounded-full bg-green-400 animate-pulse"></span>
                <span class="text-xs font-bold text-white uppercase tracking-[0.2em]">Pusat Informasi Digital</span>
            </div>

            <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-[1.1] mb-6 tracking-tight">
                Gerakan Islam <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-yellow-300">
                    Berkemajuan.
                </span>
            </h1>

            <p class="text-lg md:text-xl text-gray-200 leading-relaxed mb-10 opacity-90 font-light">
                Menegakkan dan menjunjung tinggi Agama Islam sehingga terwujud masyarakat Islam yang sebenar-benarnya di era digital.
            </p>

            <div class="flex flex-wrap gap-4">
                <a href="/berita" class="px-8 py-4 bg-yellow-500 hover:bg-yellow-400 text-blue-950 font-bold rounded-xl transition-all duration-300 shadow-xl hover:shadow-yellow-500/20 transform hover:-translate-y-1">
                    Baca Berita Terkini
                </a>
                <a href="/profil" class="px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-bold rounded-xl backdrop-blur-sm border border-white/30 transition-all duration-300">
                    Tentang Kami
                </a>
            </div>

            <div class="mt-12 grid grid-cols-3 gap-8 pt-2 border-t border-white/10">
                {{-- <div>
                    <p class="text-2xl font-bold text-white">1</p>
                    <p class="text-xs text-gray-400 uppercase tracking-widest mt-1">Majelis</p>
                </div> --}}
                <div>
                    <p class="text-2xl font-bold text-white">500+</p>
                    <p class="text-xs text-gray-400 uppercase tracking-widest mt-1">Anggota</p>
                </div>
                <div>
                    <p class="text-2xl font-bold text-white">5</p>
                    <p class="text-xs text-gray-400 uppercase tracking-widest mt-1">Amal Usaha</p>
                </div>
            </div>

        </div>
    </div>

    <div class="absolute bottom-0 right-0 p-10 hidden lg:block opacity-20">
        <i class="fas fa-mosque text-[200px] text-white"></i>
    </div>
</section>