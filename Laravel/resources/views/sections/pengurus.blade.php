{{-- Container Pengurus --}}
<section class="relative w-full overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto px-4 md:px-6"> {{-- Tambah padding agar tidak mepet di mobile --}}
    
        {{-- Grid Pengurus --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-10">
            @forelse($officers as $officer)
            <div class="group w-full" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                
                {{-- Card with Tilt Effect --}}
                <div class="js-tilt relative mb-6 overflow-hidden rounded-[2.5rem] bg-slate-100 aspect-[4/5] shadow-sm border border-slate-100 transition-all duration-500 group-hover:shadow-2xl group-hover:shadow-teal-900/20"
                     data-tilt 
                     data-tilt-max="15" 
                     data-tilt-speed="400" 
                     data-tilt-perspective="1000"
                     data-tilt-glare="true" 
                     data-tilt-max-glare="0.3">
                    
                    {{-- Overlay Gradasi --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-teal-950 via-teal-900/20 to-transparent translate-y-full group-hover:translate-y-0 transition-transform duration-700 ease-in-out z-10 opacity-90"></div>
                    
                    {{-- Foto Profil --}}
                    @if($officer->image)
                        <img src="{{ asset('storage/' . $officer->image) }}" 
                             class="w-full h-full object-cover grayscale-[40%] group-hover:grayscale-0 transition-all duration-1000 transform group-hover:scale-110" 
                             alt="{{ $officer->name }}">
                    @else
                        {{-- Placeholder jika foto kosong --}}
                        <div class="w-full h-full flex items-center justify-center bg-slate-200 text-slate-400">
                            <i class="fa-solid fa-user-tie text-6xl opacity-30"></i>
                        </div>
                    @endif

                    {{-- Social Media Dinamis --}}
                    <div class="absolute bottom-8 left-0 right-0 z-20 flex items-center justify-center gap-3 opacity-0 translate-y-8 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500"
                         style="transform: translateZ(50px);">
                        
                        {{-- Tautan LinkedIn --}}
                        @if($officer->linkedin_url)
                            <a href="{{ $officer->linkedin_url }}" target="_blank" class="w-9 h-9 bg-white/20 backdrop-blur-md text-white rounded-xl flex items-center justify-center hover:bg-yellow-400 hover:text-teal-950 transition-all shadow-xl">
                                <i class="fa-brands fa-linkedin-in text-sm"></i>
                            </a>
                        @endif

                        {{-- Tautan Email --}}
                        @if($officer->email)
                            <a href="mailto:{{ $officer->email }}" class="w-9 h-9 bg-white/20 backdrop-blur-md text-white rounded-xl flex items-center justify-center hover:bg-yellow-400 hover:text-teal-950 transition-all shadow-xl">
                                <i class="fa-regular fa-envelope text-sm"></i>
                            </a>
                        @endif
                    </div>
                </div>

                {{-- Info Teks --}}
                <div class="text-center px-4">
                    <h4 class="text-base font-bold text-teal-950 leading-tight mb-1 group-hover:text-teal-700 transition-colors">
                        {{ $officer->name }}
                    </h4>
                    <p class="text-[9px] font-black uppercase tracking-[0.3em] text-teal-600/60 italic">
                        {{ $officer->position }}
                    </p>
                    
                    {{-- Animated Line --}}
                    <div class="w-6 h-0.5 bg-yellow-400 mx-auto mt-4 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                </div>
            </div>
            @empty
                <div class="col-span-full py-20 text-center bg-slate-50 rounded-[2.5rem] border-2 border-dashed border-slate-200" data-aos="fade-up">
                    <i class="fa-solid fa-users-slash text-4xl text-slate-300 mb-4"></i>
                    <p class="text-slate-400 font-medium italic">Struktur pengurus sedang diperbarui.</p>
                </div>
            @endforelse
        </div>

        {{-- Footer Section --}}
        <div class="mt-10 text-center" data-aos="fade-up">
            {{-- Pastikan nama route 'profile' sesuai dengan web.php Anda --}}
            <a href="{{ route('profile') }}" 
               class="inline-flex items-center gap-4 px-10 py-4 bg-white text-teal-900 rounded-2xl font-black uppercase tracking-widest text-[12px] border border-teal-100 shadow-xl shadow-teal-900/5 hover:bg-teal-900 hover:text-white transition-all duration-500 group">
                Seluruh Struktur Organisasi
                <i class="fa-solid fa-sitemap transition-transform group-hover:rotate-90"></i>
            </a>
        </div>
    </div>
</section>