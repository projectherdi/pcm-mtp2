<section class="relative w-full h-screen bg-slate-50 py-8 overflow-hidden">
    <div class="max-w-6xl mx-auto px-6">
        
        {{-- Header Section yang Lebih Elegan --}}
        <div class="text-center mb-4" data-aos="fade-up">
            <span class="text-teal-600 text-[10px] font-black uppercase tracking-[0.4em] mb-4 block">Testimoni</span>
            <h2 class="text-3xl md:text-4xl font-['Poppins'] font-black italic text-teal-950 uppercase tracking-tighter">
                Kata Tokoh <span class="text-yellow-500">Muhammadiyah</span>
            </h2>
            <div class="w-16 h-1 bg-yellow-400 mx-auto mt-4 rounded-full"></div>
        </div>

        {{-- Slider Wrapper --}}
        <div class="swiper testimoniSlider pb-12">
            <div class="swiper-wrapper">
                @foreach($testimonis as $item)
                <div class="swiper-slide h-auto py-4">
                    {{-- Card redesain: Padding dikurangi agar tidak terlalu "bongsor" --}}
                    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/40 p-8 text-center hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 h-full flex flex-col relative overflow-hidden group">
                        
                        {{-- Ikon Quote Dikecilkan --}}
                        <div class="absolute top-6 right-8 text-teal-50 opacity-40 group-hover:opacity-100 transition-opacity">
                            <svg fill="currentColor" width="40" height="40" viewBox="0 0 32 32">
                                <path d="M10 8v8h6v2a4 4 0 0 1-4 4h-2v2h2a6 6 0 0 0 6-6V8zm12 0v8h6v2a4 4 0 0 1-4 4h-2v2h2a6 6 0 0 0 6-6V8z"/>
                            </svg>
                        </div>

                        {{-- Avatar Proporsional --}}
                        <div class="relative w-20 h-20 mx-auto mb-4">
                            <div class="absolute inset-0 bg-yellow-400 rounded-2xl rotate-6 group-hover:rotate-12 transition-transform duration-500 opacity-20"></div>
                            <img src="{{ $item->avatar ? asset('storage/' . $item->avatar) : asset('images/default-avatar.png') }}" 
                                 class="relative w-20 h-20 rounded-2xl mx-auto object-cover border-2 border-white shadow-sm z-10"
                                 alt="{{ $item->name }}">
                        </div>

                        {{-- Info Tokoh --}}
                        <h4 class="font-['Poppins'] font-bold text-lg text-teal-950 mt-4 leading-tight">
                            {{ $item->name }}
                        </h4>
                        <p class="text-[9px] font-['Poppins'] font-black text-teal-600 uppercase tracking-[0.2em] mt-1 italic">
                            {{ $item->position }}
                        </p>

                        {{-- Star Rating Dikecilkan --}}
                        <div class="flex justify-center mt-3 gap-0.5">
                            @for($i = 1; $i <= 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 {{ $i <= ($item->rating ?? 5) ? 'text-yellow-400' : 'text-gray-200' }}" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                        </div>

                        {{-- Konten Testimoni: Ukuran Teks Lebih Masuk Akal --}}
                        <div class="mt-6 flex-grow">
                            <p class="text-slate-600 font-['Poppins'] font-medium italic leading-relaxed text-sm">
                                "{{ Str::limit($item->content, 140) }}"
                            </p>
                        </div>

                        {{-- Aksen Garis Bawah --}}
                        <div class="w-8 h-1 bg-teal-100 group-hover:w-full group-hover:bg-yellow-400 transition-all duration-700 mt-6 mx-auto rounded-full"></div>

                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination Matching --}}
            <div class="swiper-pagination !static mt-12"></div>
        </div>
    </div>
</section>

<style>
    .testimoniSlider .swiper-pagination-bullet {
        width: 8px;
        height: 8px;
        background: #cbd5e1;
        opacity: 0.5;
        transition: all 0.3s ease;
    }
    .testimoniSlider .swiper-pagination-bullet-active {
        width: 24px;
        background: #0d9488 !important;
        border-radius: 10px;
        opacity: 1;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper(".testimoniSlider", {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: true,
            grabCursor: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: { slidesPerView: 1.5 },
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }
        });
    });
</script>