@extends('layouts.app')

@section('content')
<section class="relative bg-teal-900 py-24 overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-teal-800 rounded-full -mr-32 -mt-32 blur-3xl opacity-50"></div>
    <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
        <h1 class="text-4xl md:text-6xl font-['Poppins'] font-black italic tracking-tighter text-white uppercase">
            Hubungi <span class="text-yellow-400">Kami</span>
        </h1>
        <div class="w-20 h-1.5 bg-yellow-400 mx-auto mt-4 rounded-full"></div>
        <p class="mt-8 text-teal-100/80 max-w-2xl mx-auto text-lg font-['Poppins'] font-light leading-relaxed">
            Punya pertanyaan atau ingin bersilaturahmi? Kami siap melayani Anda dengan sepenuh hati.
        </p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            
            <div class="space-y-12">
                <div>
                    <h2 class="text-3xl font-['Poppins'] font-bold text-teal-900 mb-6">Informasi <span class="text-yellow-500">Silaturahmi</span></h2>
                    <p class="text-gray-500 font-['Poppins'] leading-relaxed">Jangan ragu untuk menghubungi kami melalui saluran komunikasi di bawah ini atau kunjungi kantor kami langsung.</p>
                </div>

                <div class="space-y-8">
                    <div class="flex gap-6 items-start group">
                        <div class="flex-shrink-0 w-14 h-14 bg-teal-50 rounded-2xl flex items-center justify-center text-teal-600 group-hover:bg-teal-600 group-hover:text-white transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-['Poppins'] font-bold text-teal-900 mb-1">Lokasi Kantor</h4>
                            <p class="text-gray-500 font-['Poppins'] leading-relaxed">Jl. Perjuangan No. 123, Martapura,<br>Kalimantan Selatan, Indonesia</p>
                        </div>
                    </div>

                    <div class="flex gap-6 items-start group">
                        <div class="flex-shrink-0 w-14 h-14 bg-teal-50 rounded-2xl flex items-center justify-center text-teal-600 group-hover:bg-teal-600 group-hover:text-white transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-['Poppins'] font-bold text-teal-900 mb-1">Layanan WhatsApp</h4>
                            <p class="text-gray-500 font-['Poppins'] leading-relaxed">+62 812-3456-7890</p>
                        </div>
                    </div>

                    <div class="flex gap-6 items-start group">
                        <div class="flex-shrink-0 w-14 h-14 bg-teal-50 rounded-2xl flex items-center justify-center text-teal-600 group-hover:bg-teal-600 group-hover:text-white transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-['Poppins'] font-bold text-teal-900 mb-1">Email Resmi</h4>
                            <p class="text-gray-500 font-['Poppins'] leading-relaxed">info@instansi-muhammadiyah.or.id</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 p-8 md:p-12 rounded-[3rem] border border-gray-100 shadow-sm">
                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-['Poppins'] font-bold text-teal-900 uppercase tracking-widest ml-1">Nama Lengkap</label>
                            <input type="text" name="name" class="w-full px-6 py-4 rounded-2xl border-none focus:ring-2 focus:ring-teal-600 font-['Poppins'] transition-all" placeholder="Masukkan nama...">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-['Poppins'] font-bold text-teal-900 uppercase tracking-widest ml-1">Alamat Email</label>
                            <input type="email" name="email" class="w-full px-6 py-4 rounded-2xl border-none focus:ring-2 focus:ring-teal-600 font-['Poppins'] transition-all" placeholder="email@anda.com">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-['Poppins'] font-bold text-teal-900 uppercase tracking-widest ml-1">Subjek</label>
                        <select name="subject" class="w-full px-6 py-4 rounded-2xl border-none focus:ring-2 focus:ring-teal-600 font-['Poppins'] transition-all appearance-none">
                            <option value="umum">Pertanyaan Umum</option>
                            <option value="pendaftaran">Pendaftaran AUM</option>
                            <option value="kerjasama">Kerjasama Persyarikatan</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-['Poppins'] font-bold text-teal-900 uppercase tracking-widest ml-1">Pesan Anda</label>
                        <textarea name="message" rows="5" class="w-full px-6 py-4 rounded-2xl border-none focus:ring-2 focus:ring-teal-600 font-['Poppins'] transition-all" placeholder="Tuliskan pesan lengkap Anda di sini..."></textarea>
                    </div>

                    <button type="submit" class="w-full py-5 bg-teal-600 text-white font-['Poppins'] font-black italic uppercase tracking-[0.2em] rounded-2xl hover:bg-teal-700 shadow-xl shadow-teal-100 transition-all duration-300">
                        Kirim Pesan Sekarang
                    </button>
                </form>
            </div>

        </div>

        <div class="mt-24 rounded-[3rem] overflow-hidden shadow-2xl border-8 border-gray-50 h-[450px]">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127441.28291410427!2d114.7744315!3d-3.4150554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dee46c4f0393f93%3A0x403061f48ed2f30!2sMartapura%2C%20Banjar%20Regency%2C%20South%20Kalimantan!5e0!3m2!1sen!2sid!4v1710000000000!5m2!1sen!2sid" 
                class="w-full h-full border-0" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
    </div>
</section>

<style>
    /* Smoothing input agar terlihat lebih bersih */
    input, textarea, select {
        background-color: white !important;
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05);
    }
</style>
@endsection