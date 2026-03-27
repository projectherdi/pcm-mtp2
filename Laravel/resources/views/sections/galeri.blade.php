{{-- Container Grid --}}
{{-- Catatan: Hapus h-screen agar tinggi section menyesuaikan jumlah konten --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6" data-aos="fade-up">
    
    @if(isset($galleries) && $galleries->count() > 0)
        @foreach($galleries as $item)
            @php
                // Proteksi untuk field image (beberapa versi Filament menyimpan sebagai array)
                $imagePath = is_array($item->image) ? ($item->image[0] ?? null) : $item->image;
                
                // Proteksi untuk category (mengambil nama jika itu adalah relasi)
                $categoryName = isset($item->category->name) ? $item->category->name : 'Dokumentasi';
            @endphp

            {{-- Item Galeri --}}
            <div class="{{ $loop->first ? 'col-span-2 row-span-1' : 'col-span-1' }} group relative overflow-hidden rounded-[2.5rem] bg-gray-200 h-64 md:h-80 shadow-sm border border-gray-100"
                 data-aos="fade-up" 
                 data-aos-delay="{{ $loop->iteration * 100 }}">
                
                @if($imagePath)
                    <img src="{{ asset('storage/' . $imagePath) }}" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                         alt="{{ $item->title }}">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-300">
                        <i class="fa-solid fa-image text-gray-400 text-3xl"></i>
                    </div>
                @endif
                
                {{-- Overlay Informasi --}}
                <div class="absolute inset-0 bg-gradient-to-t from-teal-950/90 via-teal-950/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col justify-end p-6 md:p-8">
                    {{-- Kategori: Memanggil property 'name' bukan objeknya langsung --}}
                    <span class="text-yellow-400 text-[10px] font-black uppercase tracking-[0.2em] mb-1">
                        {{ $categoryName }}
                    </span>

                    {{-- Judul Foto --}}
                    <h4 class="text-white font-bold text-sm md:text-lg leading-tight">
                        {{ $item->title }}
                    </h4>
                    
                    {{-- Ikon Zoom --}}
                    <div class="mt-4 w-8 h-8 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <i class="fa-solid fa-magnifying-glass-plus text-xs"></i>
                    </div>
                </div>

                <div class="absolute inset-0 bg-teal-900/10 group-hover:bg-transparent transition-colors duration-500"></div>
            </div>
        @endforeach
    @else
        <div class="col-span-full py-20 text-center border-2 border-dashed border-gray-100 rounded-[2.5rem]">
            <i class="fa-solid fa-images text-4xl text-gray-200 mb-4"></i>
            <p class="text-gray-400 italic font-['Poppins']">Belum ada dokumentasi foto terbaru.</p>
        </div>
    @endif

</div>

{{-- Tombol Aksi --}}
@if(isset($galleries) && $galleries->count() > 0)
<div class="mt-20 text-center" data-aos="fade-up">
    <a href="{{ route('gallery.index') }}" 
       class="inline-flex items-center gap-4 px-10 py-4 bg-white border-2 border-teal-900 text-teal-900 rounded-2xl font-black uppercase tracking-widest text-[11px] hover:bg-teal-900 hover:text-white transition-all duration-500 group shadow-xl shadow-teal-900/5">
        Eksplor Galeri Lengkap
        <i class="fa-solid fa-images text-lg transition-transform group-hover:rotate-12"></i>
    </a>
</div>
@endif