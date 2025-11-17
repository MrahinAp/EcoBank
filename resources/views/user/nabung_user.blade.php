@extends('layouts.app')

@section('title', 'Nabung Sampah')

@section('content')

<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">

    @if(session('success'))
        <div class="p-3 mb-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-xl font-bold text-green-700 mb-4">Form Nabung Sampah</h2>

    <form action="{{ route('nabung.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nama otomatis --}}
        <div class="mb-3">
            <label class="font-semibold">Nama Lengkap</label>
            <input type="text" value="{{ session('user.username') }}"
                   class="w-full border p-2 rounded bg-gray-100" disabled>
        </div>

        {{-- Jenis Sampah --}}
        <div class="mb-3">
            <label class="font-semibold">Jenis Sampah</label>
            <select name="jenis_sampah" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih jenis sampah --</option>
                <option value="organik">Organik</option>
                <option value="anorganik">Anorganik</option>
                <option value="b3">B3 / Rumah Tangga</option>
            </select>
        </div>

        {{-- Berat --}}
        <div class="mb-3">
            <label class="font-semibold">Berat Sampah (kg)</label>
            <input type="number" step="0.1" name="berat_sampah" 
                   class="w-full border p-2 rounded" required>
        </div>

        {{-- Gambar --}}
        <div class="mb-3">
            <label class="font-semibold">Foto Sampah</label>
            <input type="file" name="gambar" class="w-full border p-2 rounded">
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Simpan
        </button>
    </form>
</div>

@endsection
