@extends('layouts.app')

@section('content')
<section class="relative bg-teal-900 py-32 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <img src="https://www.transparenttextures.com/patterns/islamic-art.png" class="w-full h-full object-cover">
    </div>
    <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
        <h1 class="text-4xl md:text-7xl font-['Poppins'] font-black italic tracking-tighter text-white uppercase">
            Profil <span class="text-yellow-400">Persyarikatan</span>
        </h1>
        <div class="w-24 h-2 bg-yellow-400 mx-auto mt-6 rounded-full shadow-xl"></div>
        <p class="mt-8 text-teal-100/80 max-w-3xl mx-auto text-lg md:text-xl font-['Poppins'] font-light leading-relaxed">
            Mengenal lebih dekat Pimpinan Cabang Muhammadiyah Martapura 2 sebagai wadah dakwah amar ma'ruf nahi munkar.
        </p>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="relative">
                <div class="absolute -top-10 -left-10 w-40 h-40 bg-yellow-100 rounded-full blur-3xl opacity-50"></div>
                <img src="{{ asset('images/gedung-pcm.jpg') }}" class="rounded-[3rem] shadow-2xl relative z-10 border-8 border-gray-50" alt="Gedung PCM">
                <div class="absolute -bottom-6 -right-6 bg-teal-600 p-8 rounded-[2rem] shadow-xl z-20 hidden md:block">
                    <p class="text-white font-['Poppins'] font-bold italic tracking-tighter text-2xl uppercase">Sejak 1912</p>
                    <p class="text-teal-100 text-xs tracking-widest uppercase">Dakwah Berkemajuan</p>
                </div>
            </div>
            
            <div class="space-y-10">
                <div>
                    <h2 class="text-4xl font-['Poppins'] font-black text-teal-900 italic tracking-tight uppercase">Visi Utama</h2>
                    <p class="mt-6 text-gray-600 font-['Poppins'] leading-loose text-lg italic border-l-4 border-yellow-400 pl-6">
                        "Terwujudnya masyarakat Islam yang sebenar-benarnya melalui sistem organisasi yang kokoh dan dakwah yang mencerahkan."
                    </p>
                </div>

                <div>
                    <h2 class="text-4xl font-['Poppins'] font-black text-teal-900 italic tracking-tight uppercase">Misi Organisasi</h2>
                    <ul class="mt-6 space-y-4">
                        @php
                            $misis = [
                                'Menanamkan keyakinan tauhid yang murni.',
                                'Menyebarluaskan ajaran Islam yang bersumber pada Al-Qur\'an dan As-Sunnah.',
                                'Mewujudkan amal usaha di bidang pendidikan, kesehatan, dan sosial.',
                                'Membina kader persyarikatan yang militan dan berakhlak mulia.'
                            ];
                        @endphp
                        @foreach($misis as $misi)
                        <li class="flex items-start gap-4 group">
                            <span class="flex-shrink-0 w-8 h-8 bg-teal-100 text-teal-600 rounded-full flex items-center justify-center font-bold text-sm group-hover:bg-teal-600 group-hover:text-white transition-all duration-300">
                                {{ $loop->iteration }}
                            </span>
                            <p class="text-gray-600 font-['Poppins'] font-medium">{{ $misi }}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-5xl font-['Poppins'] font-black italic text-teal-900 uppercase tracking-tighter">
            Struktur <span class="text-yellow-500">Pimpinan</span>
        </h2>
        <div class="w-20 h-1.5 bg-yellow-400 mx-auto mt-4 rounded-full mb-16"></div>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
            {{-- DATA DINAMIS DARI DATABASE --}}
            @forelse($officers as $officer)
            <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-xl shadow-gray-200/50 hover:-translate-y-2 transition-all duration-500 group">
                
                {{-- Foto Profil Dinamis --}}
                <div class="w-24 h-24 rounded-full mx-auto mb-6 overflow-hidden border-4 border-teal-50 group-hover:border-teal-600 transition-all duration-500">
                    @if($officer->image)
                        <img src="{{ asset('storage/' . $officer->image) }}" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" 
                             alt="{{ $officer->name }}">
                    @else
                        <div class="w-full h-full bg-teal-50 flex items-center justify-center group-hover:bg-teal-600 transition-colors">
                            <i class="fa-solid fa-user-tie text-3xl text-teal-600 group-hover:text-white"></i>
                        </div>
                    @endif
                </div>

                <h4 class="font-['Poppins'] font-bold text-teal-900 text-lg leading-tight">
                    {{ $officer->name }}
                </h4>
                <p class="text-yellow-600 text-[10px] font-black uppercase tracking-[0.2em] mt-2">
                    {{ $officer->position }}
                </p>

                {{-- Tautan Sosial Media (Jika ada) --}}
                <div class="mt-4 flex justify-center gap-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    @if($officer->linkedin_url)
                        <a href="{{ $officer->linkedin_url }}" target="_blank" class="text-teal-600 hover:text-teal-900"><i class="fa-brands fa-linkedin"></i></a>
                    @endif
                    @if($officer->email)
                        <a href="mailto:{{ $officer->email }}" class="text-teal-600 hover:text-teal-900"><i class="fa-solid fa-envelope"></i></a>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-full py-10 text-center text-gray-400 italic">
                Data pimpinan belum tersedia.
            </div>
            @endforelse
        </div>
    </div>
</section>

<section class="py-24 bg-teal-900">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-5xl font-['Poppins'] font-black italic text-white uppercase tracking-tighter">
            Amal Usaha <span class="text-yellow-400">Muhammadiyah</span>
        </h2>
        <p class="mt-6 text-teal-100/70 max-w-2xl mx-auto font-['Poppins'] font-light">
            Kontribusi nyata kami dalam membangun peradaban bangsa melalui berbagai pilar kebaikan.
        </p>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mt-16">
            <div class="p-8 bg-teal-800/50 rounded-[2rem] border border-teal-700 group hover:bg-yellow-400 transition-all duration-500 cursor-default">
                <i class="fa-solid fa-school text-4xl text-yellow-400 group-hover:text-teal-900 mb-6"></i>
                <h5 class="text-white group-hover:text-teal-900 font-bold font-['Poppins'] uppercase text-xs tracking-widest">Pendidikan</h5>
            </div>
            <div class="p-8 bg-teal-800/50 rounded-[2rem] border border-teal-700 group hover:bg-yellow-400 transition-all duration-500 cursor-default">
                <i class="fa-solid fa-hospital text-4xl text-yellow-400 group-hover:text-teal-900 mb-6"></i>
                <h5 class="text-white group-hover:text-teal-900 font-bold font-['Poppins'] uppercase text-xs tracking-widest">Kesehatan</h5>
            </div>
            <div class="p-8 bg-teal-800/50 rounded-[2rem] border border-teal-700 group hover:bg-yellow-400 transition-all duration-500 cursor-default">
                <i class="fa-solid fa-mosque text-4xl text-yellow-400 group-hover:text-teal-900 mb-6"></i>
                <h5 class="text-white group-hover:text-teal-900 font-bold font-['Poppins'] uppercase text-xs tracking-widest">Dakwah Islamiyah</h5>
            </div>
            <div class="p-8 bg-teal-800/50 rounded-[2rem] border border-teal-700 group hover:bg-yellow-400 transition-all duration-500 cursor-default">
                <i class="fa-solid fa-hand-holding-heart text-4xl text-yellow-400 group-hover:text-teal-900 mb-6"></i>
                <h5 class="text-white group-hover:text-teal-900 font-bold font-['Poppins'] uppercase text-xs tracking-widest">Filantropi</h5>
            </div>
        </div>
    </div>
</section>
@endsection