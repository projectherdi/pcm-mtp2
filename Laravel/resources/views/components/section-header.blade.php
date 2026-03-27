@props([
    'title' => '', 
    'subtitle' => '', 
    'accent' => 'PCM Martapura 2',
    'dark' => false
])

<div class="text-center mb-16 md:mb-24 relative" data-aos="fade-up">
    <div class="absolute -top-10 left-1/2 -translate-x-1/2 opacity-[0.03] select-none pointer-events-none whitespace-nowrap">
        <span class="text-8xl md:text-9xl font-black uppercase italic">{{ $accent }}</span>
    </div>

    <p class="text-[10px] md:text-xs font-black uppercase tracking-[0.5em] mb-4 {{ $dark ? 'text-teal-300' : 'text-teal-600' }}">
        {{ $subtitle }}
    </p>

    <h2 class="text-4xl md:text-6xl font-black italic tracking-tighter uppercase leading-none {{ $dark ? 'text-white' : 'text-teal-950' }}">
        @php
            $words = explode(' ', $title);
            $lastWord = array_pop($words);
            $firstPart = implode(' ', $words);
        @endphp
        
        {{ $firstPart }} <span class="text-yellow-400 drop-shadow-sm">{{ $lastWord }}</span>
    </h2>

    <div class="flex justify-center items-center gap-3 mt-6">
        <div class="w-12 h-[3px] bg-yellow-400 rounded-full"></div>
        <div class="w-3 h-3 bg-teal-600 rounded-full {{ $dark ? 'ring-4 ring-teal-800' : 'ring-4 ring-teal-50' }}"></div>
        <div class="w-12 h-[3px] bg-yellow-400 rounded-full"></div>
    </div>
</div>