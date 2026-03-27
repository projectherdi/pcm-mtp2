<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'PCM Martapura 2' }}</title>
    
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        teal: {
                            950: '#042f2e',
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        /* Smooth scroll dan perbaikan font rendering */
        html { scroll-behavior: smooth; }
        body { 
            font-family: 'Poppins', sans-serif;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
        }
        .prose img { border-radius: 1rem; }
        
        /* Custom scrollbar agar terlihat lebih profesional */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { bg: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #0d9488; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #0f766e; }
    </style>

    @stack('styles')
</head>
<body class="font-sans antialiased bg-white text-slate-900">

    @include('components.navbar')
    
    <main>
        @yield('content')
    </main>

    @include('components.footer')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>

    <script>
        // Inisialisasi AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100,
        });

        // Global Tilt Initialization (Otomatis jalan untuk elemen .js-tilt)
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof VanillaTilt !== 'undefined') {
                VanillaTilt.init(document.querySelectorAll(".js-tilt"), {
                    max: 15,
                    speed: 400,
                    glare: true,
                    "max-glare": 0.2,
                });
            }
        });
    </script>

    @stack('scripts')
</body>
</html>