<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
    {{-- Cek apakah variabel $posts ada dan memiliki data --}}
    @if(isset($posts) && $posts->count() > 0)
        @foreach($posts as $post)
        <article class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 group border border-gray-100 flex flex-col h-full" 
                 data-aos="fade-up" 
                 data-aos-delay="{{ $loop->iteration * 100 }}">
            
            <div class="relative overflow-hidden h-64 bg-gray-200">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                         alt="{{ $post->title }}">
                @else
                    {{-- Placeholder jika gambar tidak ada --}}
                    <div class="flex items-center justify-center h-full text-gray-400">
                        <i class="fa-regular fa-image text-4xl"></i>
                    </div>
                @endif
                
                @if($post->category)
                <div class="absolute top-6 left-6">
                    <span class="px-4 py-2 bg-teal-600 text-white text-[10px] font-black uppercase tracking-widest rounded-full shadow-lg">
                        {{ $post->category->name }}
                    </span>
                </div>
                @endif
            </div>

            <div class="p-8 flex flex-col flex-grow">
                <div class="flex items-center gap-3 text-gray-400 text-[10px] font-bold uppercase tracking-widest mb-4">
                    <i class="fa-regular fa-calendar-days text-yellow-500"></i>
                    <span>{{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}</span>
                </div>

                <h3 class="text-xl font-bold text-teal-950 group-hover:text-teal-600 transition-colors line-clamp-2 leading-snug mb-4">
                    <a href="{{ route('posts.show', $post->slug) }}">
                        {{ $post->title }}
                    </a>
                </h3>

                <p class="text-gray-500 text-sm leading-relaxed line-clamp-3 mb-8">
                    {{ Str::limit(strip_tags($post->content), 120) }}
                </p>

                <div class="mt-auto">
                    <a href="{{ route('posts.show', $post->slug) }}" class="inline-flex items-center gap-2 text-[11px] font-black uppercase tracking-[0.2em] text-teal-700 group-hover:text-yellow-500 transition-all duration-300">
                        Baca Selengkapnya 
                        <i class="fa-solid fa-arrow-right transition-transform group-hover:translate-x-2"></i>
                    </a>
                </div>
            </div>
        </article>
        @endforeach
    @else
        {{-- Tampilan jika berita kosong --}}
        <div class="col-span-full py-20 text-center bg-white rounded-[2.5rem] border-2 border-dashed border-gray-200" data-aos="fade-up">
            <i class="fa-solid fa-newspaper text-5xl text-gray-200 mb-4"></i>
            <p class="text-gray-500 font-['Poppins'] italic">Belum ada kabar terbaru yang diterbitkan.</p>
        </div>
    @endif
</div>

{{-- Tombol Lihat Semua (Hanya tampil jika ada berita) --}}
@if(isset($posts) && $posts->count() > 0)
<div class="mt-20 text-center" data-aos="fade-up">
    <a href="{{ route('posts.index') }}" class="px-10 py-4 bg-teal-950 text-white rounded-2xl font-black uppercase tracking-widest text-[12px] hover:bg-yellow-400 hover:text-teal-950 transition-all duration-500 shadow-xl shadow-teal-900/10">
        Lihat Semua Kabar
    </a>
</div>
@endif