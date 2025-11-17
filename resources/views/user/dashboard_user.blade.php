@extends('layouts.app')

@section('title', 'Dashboard User')

@section('content')

@php
    $poin = $totalPoin ?? 0;

    // Tentukan level pohon
    if ($poin < 100) {
        $treeLevel = 'benih';
    } elseif ($poin < 200) {
        $treeLevel = 'kecil';
    } elseif ($poin < 500) {
        $treeLevel = 'setengah';
    } else {
        $treeLevel = 'besar';
    }

    $labels = $jenisSampah->pluck('jenis_sampah');
    $data = $jenisSampah->pluck('total');
@endphp

<div class="space-y-10">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-green-700">
           Selamat Datang, {{ $user['username'] }} 👋
        </h1>
        <p class="text-gray-600">Ayo kumpulkan poin dan besarkan pohonmu! 🌱🌳</p>
    </div>

    {{-- POHON & POIN --}}
    <div class="bg-white p-6 rounded-xl shadow-md text-center">
        <h2 class="text-xl font-bold text-green-700 mb-4">Pertumbuhan Pohonmu</h2>
        <div id="tree" class="text-6xl"></div>

        <p class="mt-4 text-lg font-semibold">
            Total Poin: <span class="text-green-700">{{ $poin }}</span>
        </p>
        <p class="text-sm text-gray-500 mt-2">
            Level Pohon: <strong id="tree-level">{{ ucfirst($treeLevel) }}</strong>
        </p>
    </div>

    {{-- Statistik --}}
    <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-xl font-bold text-green-700 mb-4">Statistik Sampahmu</h2>
        <p class="text-lg font-semibold">Total Sampah Terkumpul: <span class="text-green-700">{{ $totalBerat }} kg</span></p>

        <canvas id="sampahChart" width="400" height="200"></canvas>
    </div>

</div>

{{-- JS POHON --}}
<script>
    const treeLevel = "{{ $treeLevel }}";
    const tree = document.getElementById('tree');
    const pohon = { benih: "🌱", kecil: "🌿", setengah: "🌳", besar: "🌲" };
    tree.innerHTML = pohon[treeLevel] ?? "🌱";
</script>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('sampahChart').getContext('2d');
    const sampahChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Berat Sampah (kg)',
                data: @json($data),
                backgroundColor: 'rgba(34,197,94,0.2)',
                borderColor: 'rgba(34,197,94,1)',
                borderWidth: 2,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                title: { display: true, text: 'Statistik Berat Sampah per Jenis' }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>

@endsection
