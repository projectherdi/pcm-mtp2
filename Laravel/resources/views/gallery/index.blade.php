@extends('layouts.app')

@section('content')
<section class="relative bg-teal-900 py-24 overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-teal-800 rounded-full -mr-32 -mt-32 blur-3xl opacity-50"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-yellow-500 rounded-full -ml-40 -mb-40 blur-[100px] opacity-10"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
        <h1 class="text-4xl md:text-6xl font-black italic tracking-tighter text-white uppercase">
            Galeri <span class="text-yellow-400">Momen</span>
        </h1>
        <div class="w-20 h-1.5 bg-yellow-400 mx-auto mt-4 rounded-full"></div>
        <p class="mt-8 text-teal-100/80 max-w-2xl mx-auto text-lg font-medium leading-relaxed">
            Rekam jejak keceriaan, kreativitas, dan Prestasi.
        </p>
    </div>
</section>

<section class="py-20 bg-white" x-data="{ activeTab: 'semua' }">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="flex flex-wrap justify-center gap-4 mb-16">
            @php
                $filters = [
                    'semua' => 'Semua',
                    'persyarikatan' => 'Persyarikatan',
                    'aum' => 'Amal Usaha',
                    'prestasi' => 'Prestasi',
                    'umum' => 'Umum'
                ];
            @endphp

            @foreach($filters as $key => $label)
                <button @click="activeTab = '{{ $key }}'" 
                    :class="activeTab === '{{ $key }}' ? 'bg-teal-600 text-white shadow-xl shadow-teal-100' : 'bg-gray-50 text-gray-500 hover:bg-teal-50'"
                    class="px-8 py-3 rounded-2xl font-bold transition-all duration-300 uppercase text-[10px] tracking-widest outline-none">
                    {{ $label }}
                </button>
            @endforeach
        </div>

        <div class="columns-1 md:columns-2 lg:columns-3 gap-6">
            
            @forelse($galleries as $gallery)
                @if(is_array($gallery->image))
                    @foreach($gallery->image as $photo)
                        <div x-show="activeTab === 'semua' || activeTab === '{{ $gallery->category }}'"
                             x-transition:enter="transition ease-out duration-500"
                             x-transition:enter-start="opacity-0 translate-y-4"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="break-inside-avoid group relative overflow-hidden rounded-[2rem] bg-gray-100 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 mb-6 inline-block w-full">
                            
                            <img src="{{ asset('storage/' . $photo) }}" 
                                 loading="lazy"
                                 class="w-full h-auto object-cover group-hover:scale-110 transition duration-700" 
                                 alt="{{ $gallery->title }}">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-teal-900/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col justify-end p-8 text-left">
                                <span class="text-yellow-400 text-[10px] font-bold uppercase tracking-[0.2em] mb-2">
                                    {{ $gallery->category }}
                                </span>
                                <h4 class="text-white font-bold italic tracking-tight text-xl leading-tight">
                                    {{ $gallery->title }}
                                </h4>
                            </div>
                        </div>
                    @endforeach
                @endif
            @empty
                <div class="w-full py-20 text-center flex flex-col items-center justify-center">
                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4 text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <p class="text-gray-400 italic font-medium tracking-wide">Belum ada koleksi foto saat ini.</p>
                </div>
            @endforelse

        </div>

        <div class="mt-24">
            {{ $galleries->links() }}
        </div>
    </div>
</section>

<style>
    /* CSS Grid Masonry Fixes */
    .break-inside-avoid {
        break-inside: avoid;
    }

    /* Custom Styling Pagination Laravel agar matching dengan Teal & Yellow */
    .pagination {
        @apply flex justify-center items-center gap-2;
    }
    .page-item .page-link {
        @apply w-12 h-12 flex items-center justify-center rounded-xl bg-gray-50 text-teal-800 font-bold border-none transition-all hover:bg-teal-100;
    }
    .page-item.active .page-link {
        @apply bg-teal-600 text-white shadow-lg shadow-teal-100;
    }
    .page-item.disabled .page-link {
        @apply opacity-30 cursor-not-allowed;
    }
</style>
@endsection