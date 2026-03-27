@extends('layouts.app')

@section('content')
    {{-- 1. Section Hero --}}
    {{-- Hero biasanya tidak pakai padding-top tambahan karena sudah ada margin dari navbar --}}
    <div class="relative overflow-hidden">
        @include('sections.hero')
    </div>

    {{-- Container Utama untuk Konten --}}
    <div class="space-y-0 md:space-y-10 bg-white">
        
        {{-- 2. Section Berita Terbaru --}}
        <section class="py-20  border-gray-100">
            <div class="max-w-7xl mx-auto px-6">
                <x-section-header 
                    subtitle="Informasi & Kabar Terkini" 
                    title="Warta Berita" 
                    accent="WARTA"
                />

                @include('sections.berita')
            </div>
        </section>

        {{-- 3. Section Galeri Foto --}}
        <section class="py-24 md:py-32 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                {{-- Judul Section yang Konsisten dengan Warta --}}
                <x-section-header 
                    subtitle="Dokumentasi Kegiatan" 
                    title="Galeri Foto" 
                    accent="MOMEN"
                />
                
                {{-- Konten Galeri --}}
                <div class="mt-16">
                    @include('sections.galeri')
                </div>
            </div>
        </section>

        {{-- 4. Section Testimoni --}}
        {{-- Menggunakan background Teal gelap khas Muhammadiyah jika ingin variasi --}}
        <section>
            @include('sections.testimoni')
        </section>

        {{-- 5. Section Daftar Pengurus --}}
        <section class="py-8">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                {{-- Judul Section yang Konsisten --}}
                <x-section-header 
                    subtitle="Struktur Organisasi" 
                    title="Pimpinan Cabang" 
                    accent="PENGURUS"
                />
                
                {{-- Konten Pengurus --}}
                <div class="mt-16">
                    @include('sections.pengurus')
                </div>
            </div>
        </section>

        {{-- 6. Section Peta Lokasi & Kontak --}}
        {{-- Peta biasanya diletakkan di paling bawah sebelum footer tanpa padding bawah berlebih --}}
        <section class="pt-20 md:pt-32 pb-0">
            @include('sections.peta')
        </section>
        
    </div>
@endsection