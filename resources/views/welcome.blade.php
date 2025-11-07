@extends('layouts.apps')

@section('title', 'Selamat Datang di EcoBank')

@section('content')
<div class="container mx-auto px-4 space-y-12">

    {{-- Header Perkenalan --}}
    <section class="relative text-center py-16 bg-green-50 rounded-xl">
        <h1 class="text-4xl md:text-5xl font-bold text-green-700 mb-4">Selamat Datang di EcoBank ♻️</h1>
        <p class="text-gray-700 max-w-3xl mx-auto text-lg md:text-xl">
            EcoBank membantu kamu memahami cara menjaga kebersihan lingkungan
            dan mengelola sampah secara bijak, plus tips & artikel menarik seputar daur ulang.
        </p>

        {{-- Tombol Login --}}
        <a href="{{ route('login') }}" 
           class="absolute right-4 top-4 bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition z-10">
           Login    
        </a>
    </section>

    {{-- Artikel Edukasi --}}
    <section>
        <h2 class="text-2xl md:text-3xl font-semibold mb-6 text-green-700">Artikel Edukasi</h2>

        @php
            $firstThree = $artikels->take(3);
            $rest = $artikels->slice(3);
        @endphp

        <div class="relative">
            <div id="artikel-slider" class="flex gap-6 overflow-hidden">
                @foreach ($artikels as $artikel)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition flex-shrink-0 w-80">
                        @if($artikel->gambar)
                            <img src="data:image/jpeg;base64,{{ base64_encode($artikel->gambar) }}" 
                                 class="w-full h-40 object-cover" alt="{{ $artikel->judul }}">
                        @else
                            <img src="{{ asset('images/default.png') }}" 
                                 class="w-full h-40 object-cover" alt="Default Image">
                        @endif
                        <div class="p-4 flex flex-col h-full">
                            <h3 class="font-semibold text-green-700">{{ $artikel->judul }}</h3>
                            <p class="text-sm text-gray-600 mt-1 flex-1">{{ $artikel->deskripsi }}</p>
                            <a href="{{ $artikel->link_artikel ?? '#' }}" 
                               class="text-green-600 text-sm font-medium hover:underline mt-2">
                               Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($artikels->count() > 3)
                <button id="prev" class="absolute left-0 top-1/2 -translate-y-1/2 text-white text-3xl px-2 py-2 z-10 bg-transparent">‹</button>
                <button id="next" class="absolute right-0 top-1/2 -translate-y-1/2 text-white text-3xl px-2 py-2 z-10 bg-transparent">›</button>
            @endif
        </div>
    </section>

    {{-- Galeri Kegiatan --}}
    <section>
        <h2 class="text-2xl md:text-3xl font-semibold mb-6 text-green-700">Galeri Kegiatan</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach (['galeri1.jpg','galeri2.jpg','galeri3.jpg'] as $galeri)
                <img src="{{ asset('images/'.$galeri) }}" 
                     class="w-full h-48 object-cover rounded-lg shadow-sm hover:scale-105 transition">
            @endforeach
        </div>
    </section>

    {{-- Tentang Website --}}
    <section class="py-12 bg-green-50 rounded-xl">
        <h2 class="text-2xl md:text-3xl font-semibold mb-4 text-green-700">Tentang EcoBank</h2>
        <p class="text-gray-700 max-w-3xl">
            EcoBank hadir untuk memberikan informasi dan edukasi seputar pengelolaan sampah,
            daur ulang, dan menjaga lingkungan. Di sini, kamu bisa membaca artikel edukasi,
            melihat galeri kegiatan, dan mempelajari tips bijak dalam mengelola sampah agar bumi tetap bersih.
        </p>
    </section>

</div>

<script>
    const slider = document.getElementById('artikel-slider');
    const nextBtn = document.getElementById('next');
    const prevBtn = document.getElementById('prev');
    const cardWidth = 320 + 24;

    let scrollPos = 0;

    nextBtn?.addEventListener('click', () => {
        scrollPos += cardWidth;
        if(scrollPos > slider.scrollWidth - slider.clientWidth) scrollPos = slider.scrollWidth - slider.clientWidth;
        slider.scrollTo({ left: scrollPos, behavior: 'smooth' });
    });

    prevBtn?.addEventListener('click', () => {
        scrollPos -= cardWidth;
        if(scrollPos < 0) scrollPos = 0;
        slider.scrollTo({ left: scrollPos, behavior: 'smooth' });
    });
</script>
@endsection
