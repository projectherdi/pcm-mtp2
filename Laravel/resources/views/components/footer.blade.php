<footer class="bg-teal-900 text-white pt-20 pb-10 overflow-hidden relative">
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-400 via-teal-500 to-yellow-400"></div>
    
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            
            <div class="col-span-1 lg:col-span-1">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="bg-white p-1.5 rounded-lg shadow-sm">
                        <img src="{{ asset('logo.png') }}" class="h-10 w-auto" alt="Logo">
                    </div>
                    <span class="text-xl font-bold tracking-tighter uppercase italic">PCM <span class="text-yellow-400">Martapura 2</span></span>
                </div>
                <p class="text-teal-100/70 leading-relaxed font-light text-sm mb-6">
                    Mewujudkan masyarakat Islam yang sebenar-benarnya melalui dakwah pendidikan dan amal usaha yang berkemajuan.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 bg-teal-800 rounded-xl flex items-center justify-center hover:bg-yellow-400 hover:text-teal-900 transition-all duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-teal-800 rounded-xl flex items-center justify-center hover:bg-yellow-400 hover:text-teal-900 transition-all duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-white font-bold uppercase tracking-widest text-xs mb-8 border-l-4 border-yellow-400 pl-4">Navigasi</h4>
                <ul class="space-y-4 text-teal-100/70 text-sm font-medium">
                    <li><a href="/" class="hover:text-yellow-400 transition">Beranda</a></li>
                    <li><a href="#" class="hover:text-yellow-400 transition">Profil Instansi</a></li>
                    <li><a href="/posts" class="hover:text-yellow-400 transition">Kabar Berita</a></li>
                    <li><a href="/gallery" class="hover:text-yellow-400 transition">Galeri Kegiatan</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold uppercase tracking-widest text-xs mb-8 border-l-4 border-yellow-400 pl-4">Kontak Kami</h4>
                <ul class="space-y-4 text-teal-100/70 text-sm">
                    <li class="flex items-start gap-3">
                        <span class="text-yellow-400">📍</span>
                        <span>Jl. Mesjid RT.02 Desa Indrasari, Martapura, Kalimantan Selatan</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-yellow-400">📞</span>
                        <span>0822-9117-7775</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-yellow-400">📧</span>
                        <span>info@pcm-martapura2.or.id</span>
                    </li>
                </ul>
            </div>

            {{-- <div>
                <h4 class="text-white font-bold uppercase tracking-widest text-xs mb-8 border-l-4 border-yellow-400 pl-4">Jam Layanan</h4>
                <div class="bg-teal-800/50 p-6 rounded-2xl border border-teal-700/50">
                    <div class="flex justify-between mb-2">
                        <span class="text-xs text-teal-300">Senin - Kamis</span>
                        <span class="text-xs font-bold text-white">08.00 - 15.00</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-xs text-teal-300">Jumat</span>
                        <span class="text-xs font-bold text-white">08.00 - 11.30</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-xs text-teal-300">Sabtu</span>
                        <span class="text-xs font-bold text-white">08.00 - 13.00</span>
                    </div>
                </div>
            </div> --}}

        </div>

        <div class="pt-10 border-t border-teal-800 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-[11px] text-teal-100/40 uppercase tracking-[0.2em] font-medium">
                &copy; 2026 PCM Martapura 2. All Rights Reserved.
            </p>
            <p class="text-[11px] text-teal-100/40 uppercase tracking-[0.2em] font-medium">
                Developed by <span class="text-teal-300">Dii</span>
            </p>
        </div>
    </div>
</footer>