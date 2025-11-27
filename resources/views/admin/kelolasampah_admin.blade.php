@extends('layouts.appa')

@section('title', 'Kelola Sampah')

@section('content')

<div class="bg-white rounded-2xl shadow-lg p-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Data Tabungan Sampah</h2>
    </div>

    <div class="overflow-x-auto rounded-xl border border-gray-200">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-green-600 text-white text-left">
                    <th class="py-3 px-4">ID</th>
                    <th class="py-3 px-4">Username</th>
                    <th class="py-3 px-4">Jenis Sampah</th>
                    <th class="py-3 px-4">Berat (kg)</th>
                    <th class="py-3 px-4">Point</th>
                    <th class="py-3 px-4">Gambar</th>
                    <th class="py-3 px-4">Created At</th>
                    <th class="py-3 px-4">Updated At</th>

                </tr>
            </thead>
            <tbody>
                @forelse($tabungan as $item)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                        <td class="py-3 px-4">{{ $item->id }}</td>
                        <td class="py-3 px-4">{{ $item->username }}</td>
                        <td class="py-3 px-4">{{ $item->jenis_sampah }}</td>
                        <td class="py-3 px-4">{{ $item->berat_sampah }} kg</td>
                        <td class="py-3 px-4 font-semibold text-green-700">{{ $item->point }}</td>

                        <td class="py-3 px-4">
                            @if($item->gambar)
                                <img src="data:image/jpeg;base64,{{ base64_encode($item->gambar) }}"
                                     alt="gambar"
                                     class="w-14 h-14 rounded object-cover border shadow-sm">
                            @else
                                <span class="text-gray-400 text-xs">Tidak ada</span>
                            @endif
                        </td>

                        <td class="py-3 px-4 text-xs">{{ $item->created_at }}</td>
                        <td class="py-3 px-4 text-xs">{{ $item->updated_at }}</td>

                       
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="py-6 text-center text-gray-500">
                            Tidak ada data tabungan sampah.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
