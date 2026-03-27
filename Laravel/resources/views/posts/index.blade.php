@extends('layouts.app')

@section('content')
<section class="bg-teal-700 py-20">
    <div class="max-w-7xl mx-auto px-6 text-center text-white">
        <h1 class="text-4xl md:text-5xl font-extrabold italic tracking-tighter uppercase">Kabar <span class="text-teal-200">Pimpinan Cabang Muhammadiyah Martapura 2</span></h1>
        <div class="w-20 h-1 bg-yellow-400 mx-auto mt-4"></div>
        <p class="mt-6 text-teal-50 max-w-2xl mx-auto opacity-80">Informasi terbaru, kegiatan, dan prestasi dari PCM MTP2</p>
    </div>
</section>

<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($posts as $post) {{-- Menggunakan $posts dari Controller --}}
            <article class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm border border-gray-100 hover:shadow-2xl transition-all duration-500 group flex flex-col h-full">
                
                <div class="relative overflow-hidden aspect-video">
                    <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('images/default-news.jpg') }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-700"
                         alt="{{ $post->title }}">
                    <div class="absolute top-4 left-4 bg-teal-600 text-white text-[10px] font-bold px-4 py-1.5 rounded-full uppercase tracking-widest shadow-lg">
                        {{ $post->category->name ?? 'Informasi' }}
                    </div>
                </div>
                
                <div class="p-8 flex flex-col flex-grow">
                    <div class="flex items-center gap-3 text-gray-400 text-[10px] mb-4 uppercase font-bold tracking-widest">
                        <span>{{ $post->published_at->translatedFormat('d M Y') }}</span>
                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                        <span>{{ $post->author->name ?? 'Admin' }}</span>
                    </div>
                    
                    <h3 class="text-xl font-extrabold text-gray-900 mb-4 group-hover:text-teal-600 transition leading-snug">
                        <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                    </h3>
                    
                    <p class="text-gray-600 text-sm leading-relaxed mb-8 line-clamp-3 flex-grow">
                        {{ Str::limit(strip_tags($post->content), 120) }}
                    </p>
                    
                    <a href="{{ route('posts.show', $post->slug) }}" class="inline-flex items-center gap-2 text-teal-600 font-bold text-[10px] uppercase tracking-[0.2em] group/btn transition-all">
                        Baca Selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover/btn:translate-x-2 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </article>
            @empty
            <div class="col-span-full text-center py-20">
                <p class="text-gray-400 italic font-serif">Belum ada warta yang diterbitkan.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-20 flex justify-center custom-pagination">
            {{ $posts->links() }}
        </div>

    </div>
</section>

<style>
    /* Merapikan tampilan pagination agar selaras dengan tema Teal */
    .custom-pagination nav svg { height: 1.25rem; width: 1.25rem; }
    .custom-pagination nav span, .custom-pagination nav a { border-radius: 0.75rem !important; margin: 0 4px; }
</style>
@endsection