@extends('layouts.app')

@section('title', 'Dashboard User')

@section('content')
<div class="space-y-8">
    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-green-700">
            Selamat Datang, {{ $user['username'] }} 👋
        </h1>
        <p class="text-gray-600">
            Yuk pelajari cara menjaga kebersihan lingkungan dan mengelola sampah dengan bijak ♻️
        </p>
    </div>

    {{-- Artikel Edukasi --}}
    <section>
        <h2 class="text-xl font-semibold mb-4 text-green-700">Artikel Edukasi</h2>

        @php
            $firstThree = $artikels->take(3);
            $rest = $artikels->slice(3);
        @endphp

        {{-- Flex container --}}
        <div class="relative">
            <div id="artikel-slider" class="flex gap-6 overflow-hidden">
                {{-- Tiga artikel pertama --}}
                @foreach ($firstThree as $artikel)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition flex-shrink-0 w-80">
                        @if($artikel->gambar)
                            <img src="data:image/jpeg;base64,{{ base64_encode($artikel->gambar) }}" 
                                 class="w-full h-40 object-cover" alt="{{ $artikel->judul }}">
                        @else
                            <img src="{{ asset('images/default.png') }}" 
                                 class="w-full h-40 object-cover" alt="Default Image">
                        @endif
                        <div class="p-4">
                            <h3 class="font-semibold text-green-700">{{ $artikel->judul }}</h3>
                            <p class="text-sm text-gray-600 mt-1">{{ $artikel->deskripsi }}</p>
                            <a href="{{ $artikel->link_artikel ?? '#' }}" 
                               class="text-green-600 text-sm font-medium hover:underline mt-2 inline-block">
                               Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                @endforeach

                {{-- Artikel ke-4 dst --}}
                @foreach ($rest as $artikel)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition flex-shrink-0 w-80">
                        @if($artikel->gambar)
                            <img src="data:image/jpeg;base64,{{ base64_encode($artikel->gambar) }}" 
                                 class="w-full h-40 object-cover" alt="{{ $artikel->judul }}">
                        @else
                            <img src="{{ asset('images/default.png') }}" 
                                 class="w-full h-40 object-cover" alt="Default Image">
                        @endif
                        <div class="p-4">
                            <h3 class="font-semibold text-green-700">{{ $artikel->judul }}</h3>
                            <p class="text-sm text-gray-600 mt-1">{{ $artikel->deskripsi }}</p>
                            <a href="{{ $artikel->link_artikel ?? '#' }}" 
                               class="text-green-600 text-sm font-medium hover:underline mt-2 inline-block">
                               Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Tombol Geser Transparan --}}
            @if($rest->count() > 0)
                <button id="prev" 
                        class="absolute left-0 top-1/2 -translate-y-1/2 text-2xl px-2 py-2 bg-transparent">
                    ‹
                </button>
                <button id="next" 
                        class="absolute right-0 top-1/2 -translate-y-1/2 text-2xl px-2 py-2 bg-transparent">
                    ›
                </button>
            @endif
        </div>
    </section>

    {{-- Galeri Kegiatan --}}
    <section>
        <h2 class="text-xl font-semibold mb-4 text-green-700">Galeri Kegiatan</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach (['galeri1.jpg','galeri2.jpg','galeri3.jpg'] as $galeri)
                <img src="{{ asset('images/'.$galeri) }}" 
                     class="w-full h-48 object-cover rounded-lg shadow-sm hover:scale-105 transition">
            @endforeach
        </div>
    </section>
</div>

<script>
    const slider = document.getElementById('artikel-slider');
    const nextBtn = document.getElementById('next');
    const prevBtn = document.getElementById('prev');
    const cardWidth = 320 + 24; // w-80 + gap-6

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
