@extends('layouts.appa')

@section('title', 'Dashboard Admin')

@section('content')

@php
    $totalPoin = $totalPoin ?? 0;
    $totalBerat = $totalBerat ?? 0;
    $totalUsers = $totalUsers ?? 0;

    // Tentukan level pohon berdasarkan total poin keseluruhan
    if ($totalPoin < 1000) {
        $treeLevel = 'benih';
        $nextLevel = 1000;
        $levelName = 'Benih';
    } elseif ($totalPoin < 5000) {
        $treeLevel = 'kecil';
        $nextLevel = 5000;
        $levelName = 'Tunas';
    } elseif ($totalPoin < 10000) {
        $treeLevel = 'setengah';
        $nextLevel = 10000;
        $levelName = 'Pohon Muda';
    } else {
        $treeLevel = 'besar';
        $nextLevel = null;
        $levelName = 'Pohon Dewasa';
    }

    // Hitung progress ke level berikutnya
    if ($nextLevel) {
        $prevLevel = $totalPoin < 1000 ? 0 : ($totalPoin < 5000 ? 1000 : 5000);
        $progress = (($totalPoin - $prevLevel) / ($nextLevel - $prevLevel)) * 100;
    } else {
        $progress = 100;
    }

    $labels = $jenisSampah->pluck('jenis_sampah');
    $data = $jenisSampah->pluck('total');
@endphp

<div class="p-10 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">
            Selamat Datang, Admin {{ $admin['username'] ?? 'Admin' }}!
        </h1>
        <p class="text-gray-600 text-lg">Pantau pertumbuhan sistem dan aktivitas pengguna.</p>
    </div>

    {{-- Stats Cards Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        
        {{-- Total Pengguna --}}
        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-green-100 text-sm font-medium mb-1">Total Pengguna</p>
                    <h3 class="text-4xl font-bold">{{ number_format($totalUsers) }}</h3>
                </div>
                <div class="bg-white/20 p-4 rounded-xl">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                    </svg>
                </div>
            </div>
            <p class="text-green-100 text-sm">Pengguna Terdaftar</p>
        </div>

        {{-- Total Sampah Keseluruhan --}}
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-blue-100 text-sm font-medium mb-1">Total Sampah</p>
                    <h3 class="text-4xl font-bold">{{ number_format($totalBerat, 1) }}</h3>
                </div>
                <div class="bg-white/20 p-4 rounded-xl">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                    </svg>
                </div>
            </div>
            <p class="text-blue-100 text-sm">Kilogram Terkumpul</p>
        </div>

        {{-- Total Poin Keseluruhan --}}
        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-purple-100 text-sm font-medium mb-1">Total Poin</p>
                    <h3 class="text-4xl font-bold">{{ number_format($totalPoin) }}</h3>
                </div>
                <div class="bg-white/20 p-4 rounded-xl">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <p class="text-purple-100 text-sm">Level Sistem: <strong>{{ $levelName }}</strong></p>
        </div>

    </div>

    {{-- Main Content Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- POHON & PROGRESS --}}
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-xl p-8 text-center h-full">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center justify-center">
                    <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                    Pertumbuhan Sistem
                </h2>
                
                {{-- Pohon Display --}}
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8 mb-6">
                    <div id="tree" class="text-9xl transform transition-all duration-500 hover:scale-110"></div>
                </div>

                {{-- Level Info --}}
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-semibold text-gray-700">Level: {{ $levelName }}</span>
                        @if($nextLevel)
                            <span class="text-sm font-semibold text-gray-700">{{ $totalPoin }} / {{ $nextLevel }}</span>
                        @else
                            <span class="text-sm font-semibold text-green-600">Max Level!</span>
                        @endif
                    </div>
                    
                    {{-- Progress Bar --}}
                    <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                        <div class="bg-gradient-to-r from-green-500 to-green-600 h-3 rounded-full transition-all duration-500 shadow-lg" 
                             style="width: {{ $progress }}%"></div>
                    </div>
                    
                    @if($nextLevel)
                        <p class="text-xs text-gray-500 mt-2">{{ $nextLevel - $totalPoin }} poin lagi ke level berikutnya</p>
                    @else
                        <p class="text-xs text-green-600 mt-2 font-semibold">Selamat! Sistem sudah maksimal!</p>
                    @endif
                </div>

                {{-- Level Milestones --}}
                <div class="space-y-2 text-left bg-gray-50 rounded-xl p-4">
                    <h3 class="font-semibold text-gray-700 mb-3 text-center">Level Sistem</h3>
                    <div class="flex items-center text-sm {{ $totalPoin >= 0 ? 'text-green-600 font-semibold' : 'text-gray-400' }}">
                        <span class="text-2xl mr-2">🌱</span>
                        <span>Benih (0-999 poin)</span>
                    </div>
                    <div class="flex items-center text-sm {{ $totalPoin >= 1000 ? 'text-green-600 font-semibold' : 'text-gray-400' }}">
                        <span class="text-2xl mr-2">🌿</span>
                        <span>Tunas (1000-4999 poin)</span>
                    </div>
                    <div class="flex items-center text-sm {{ $totalPoin >= 5000 ? 'text-green-600 font-semibold' : 'text-gray-400' }}">
                        <span class="text-2xl mr-2">🌳</span>
                        <span>Pohon Muda (5000-9999 poin)</span>
                    </div>
                    <div class="flex items-center text-sm {{ $totalPoin >= 10000 ? 'text-green-600 font-semibold' : 'text-gray-400' }}">
                        <span class="text-2xl mr-2">🌲</span>
                        <span>Pohon Dewasa (10000+ poin)</span>
                    </div>
                </div>

            </div>
        </div>

        {{-- STATISTIK CHART --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-xl p-8 h-full">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Statistik Sampah Keseluruhan
                    </h2>
                </div>

                @if($jenisSampah->count() > 0)
                    <div class="mb-6">
                        <canvas id="sampahChart" height="100"></canvas>
                    </div>

                    {{-- Detail Table --}}
                    <div class="bg-gray-50 rounded-xl p-6">
                        <h3 class="font-semibold text-gray-700 mb-4">Detail per Jenis</h3>
                        <div class="space-y-3">
                            @foreach($jenisSampah as $item)
                                <div class="flex items-center justify-between bg-white p-3 rounded-lg shadow-sm">
                                    <div class="flex items-center">
                                        <span class="w-3 h-3 rounded-full mr-3 {{ $item->jenis_sampah == 'organik' ? 'bg-green-500' : ($item->jenis_sampah == 'anorganik' ? 'bg-blue-500' : 'bg-red-500') }}"></span>
                                        <span class="font-medium text-gray-700 capitalize">{{ $item->jenis_sampah }}</span>
                                    </div>
                                    <div class="text-right">
                                        <span class="font-bold text-gray-800">{{ number_format($item->total, 2) }} kg</span>
                                        <span class="text-xs text-gray-500 block">{{ number_format(($item->total / $totalBerat) * 100, 1) }}%</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Data</h3>
                        <p class="text-gray-500">Belum ada sampah yang dikumpulkan</p>
                    </div>
                @endif

            </div>
        </div>

    </div>

</div>

{{-- JS POHON --}}

<script> const treeLevel = "{{ $treeLevel }}"; const tree = document.getElementById('tree'); const pohon = { benih: "🌱", kecil: "🌿", setengah: "🌳", besar: "🌲" }; tree.innerHTML = pohon[treeLevel] || "🌱"; </script>
{{-- Chart.js --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <script> @if($jenisSampah->count() > 0) const ctx = document.getElementById('sampahChart').getContext('2d'); const sampahChart = new Chart(ctx, { type: 'bar', data: { labels: @json($labels), datasets: [{ label: 'Berat Sampah (kg)', data: @json($data), backgroundColor: [ 'rgba(34, 197, 94, 0.8)', // green 'rgba(59, 130, 246, 0.8)', // blue 'rgba(239, 68, 68, 0.8)', // red ], borderColor: [ 'rgba(34, 197, 94, 1)', 'rgba(59, 130, 246, 1)', 'rgba(239, 68, 68, 1)', ], borderWidth: 2, borderRadius: 8, }] }, options: { responsive: true, maintainAspectRatio: true, plugins: { legend: { display: false }, title: { display: false }, tooltip: { backgroundColor: 'rgba(0, 0, 0, 0.8)', padding: 12, titleFont: { size: 14, weight: 'bold' }, bodyFont: { size: 13 }, callbacks: { label: function(context) { return context.parsed.y + ' kg'; } } } }, scales: { y: { beginAtZero: true, grid: { color: 'rgba(0, 0, 0, 0.05)', }, ticks: { callback: function(value) { return value + ' kg'; } } }, x: { grid: { display: false } } } } }); @endif </script>
@endsection