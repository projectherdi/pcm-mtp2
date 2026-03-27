@extends('layouts.app')

@section('content')
<article class="bg-white">
    <div class="bg-gray-50 border-b border-gray-100 py-16">
        <div class="max-w-4xl mx-auto px-6">
            <nav class="flex items-center gap-3 text-gray-400 text-[10px] font-bold uppercase tracking-[0.2em] mb-10">
                <a href="/" class="hover:text-teal-600 transition">Beranda</a>
                <span class="text-gray-200">/</span>
                <a href="{{ route('posts.index') }}" class="hover:text-teal-600 transition">Kabar</a>
                <span class="text-gray-200">/</span>
                <span class="text-teal-600 italic">Baca Berita</span>
            </nav>

            <div class="inline-block bg-teal-600 text-white text-[10px] font-extrabold px-4 py-1 rounded-full uppercase tracking-widest mb-6 shadow-md shadow-teal-100">
                {{ $post->category->name ?? 'Informasi' }}
            </div>

            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-[1.15] italic tracking-tighter mb-8">
                {{ $post->title }}
            </h1>

            <div class="flex flex-wrap items-center gap-6 pt-6 border-t border-gray-200/60">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-teal-100 flex items-center justify-center text-teal-700 font-bold border border-teal-200">
                        {{ substr($post->author->name ?? 'A', 0, 1) }}
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Penulis</p>
                        <p class="text-sm font-bold text-gray-900">{{ $post->author->name ?? 'Administrator' }}</p>
                    </div>
                </div>
                <div class="h-8 w-[1px] bg-gray-200 hidden md:block"></div>
                <div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Tanggal</p>
                    <p class="text-sm font-bold text-gray-900">{{ $post->published_at->translatedFormat('d F Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-6 py-16">
        @if($post->image)
        <div class="mb-16">
            <img src="{{ asset('storage/' . $post->image) }}" 
                 class="w-full h-auto rounded-[2.5rem] shadow-2xl shadow-gray-200 object-cover" 
                 alt="{{ $post->title }}">
        </div>
        @endif

        <div class="prose prose-lg prose-teal max-w-none text-gray-700 leading-relaxed font-serif">
            {!! $post->content !!}
        </div>

        <div class="mt-20 pt-10 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="flex items-center gap-4">
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Bagikan:</span>
                <div class="flex gap-2">
                    <a href="https://wa.me/?text={{ urlencode(url()->current()) }}" target="_blank" class="w-10 h-10 rounded-xl bg-green-50 text-green-600 flex items-center justify-center hover:bg-green-600 hover:text-white transition-all">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>

            <a href="{{ route('posts.index') }}" class="inline-flex items-center gap-3 text-[10px] font-bold text-teal-600 uppercase tracking-[0.3em] group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:-translate-x-2 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Kabar
            </a>
        </div>
    </div>
</article>

@if(isset($relatedPosts) && $relatedPosts->count() > 0)
<section class="bg-gray-50 py-20 border-t border-gray-100">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-10 italic">Berita Terkait</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($relatedPosts as $related)
            <a href="{{ route('posts.show', $related->slug) }}" class="group flex gap-4 bg-white p-4 rounded-3xl border border-gray-100 hover:shadow-xl transition">
                <div class="w-24 h-24 shrink-0 overflow-hidden rounded-2xl">
                    <img src="{{ $related->image ? asset('storage/' . $related->image) : asset('images/default.jpg') }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div>
                    <span class="text-[9px] font-bold text-teal-600 uppercase tracking-widest">{{ $related->category->name ?? 'Warta' }}</span>
                    <h4 class="font-bold text-gray-900 group-hover:text-teal-600 transition line-clamp-2 mt-1">{{ $related->title }}</h4>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<style>
    /* Styling khusus agar konten dari editor rapi */
    .prose blockquote { border-left-color: #0d9488; font-style: italic; color: #374151; }
    .prose img { border-radius: 2rem; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05); }
    .prose strong { color: #111827; }
</style>
@endsection