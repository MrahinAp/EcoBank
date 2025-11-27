@extends('layouts.app')

@section('content')

<div class="p-10 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen max-w-7xl mx-auto">

    <!-- Header -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Riwayat Tabungan Sampah</h2>
        <p class="text-gray-600">Lihat semua aktivitas tabungan sampah Anda</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- Total Berat -->
        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium mb-1">Total Berat Sampah</p>
                    <h3 class="text-4xl font-bold">{{ number_format($total_berat, 2) }}</h3>
                    <p class="text-green-100 text-sm mt-1">Kilogram</p>
                </div>
                <div class="bg-white/20 p-4 rounded-xl">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Point -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium mb-1">Total Point</p>
                    <h3 class="text-4xl font-bold">{{ number_format($total_point) }}</h3>
                    <p class="text-blue-100 text-sm mt-1">Point Terkumpul</p>
                </div>
                <div class="bg-white/20 p-4 rounded-xl">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <!-- Table Header -->
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
            <h3 class="text-white font-semibold text-lg flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Detail Riwayat Transaksi
            </h3>
        </div>

        <!-- Table Content -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="py-4 px-6 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama</th>
                        <th class="py-4 px-6 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jenis Sampah</th>
                        <th class="py-4 px-6 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Berat</th>
                        <th class="py-4 px-6 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Point</th>
                        <th class="py-4 px-6 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Gambar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($riwayat as $item)
                    <tr class="hover:bg-green-50 transition-colors duration-200">
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-green-700 font-semibold text-sm">{{ strtoupper(substr($item->username, 0, 2)) }}</span>
                                </div>
                                <span class="font-medium text-gray-800">{{ $item->username }}</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                                {{ $item->jenis_sampah }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <div class="flex flex-col items-center">
                                <span class="text-lg font-bold text-gray-800">{{ $item->berat_sampah }}</span>
                                <span class="text-xs text-gray-500">kg</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <div class="inline-flex items-center px-4 py-2 rounded-lg bg-blue-50 border border-blue-200">
                                <svg class="w-5 h-5 text-blue-600 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                                </svg>
                                <span class="font-bold text-blue-700">{{ $item->point }}</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-center">
                            @if (isset($item->gambar_base64))
                                <div class="flex justify-center">
                                    <div class="relative group">
                                        <img src="{{ $item->gambar_base64 }}" alt="Gambar Sampah" class="w-20 h-20 rounded-xl object-cover shadow-md cursor-pointer transform transition-all duration-300 group-hover:scale-110 group-hover:shadow-xl" onclick="showImageModal('{{ $item->gambar_base64 }}')">
                                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 rounded-xl transition-all duration-300 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="flex justify-center">
                                    <div class="w-20 h-20 bg-gray-100 rounded-xl flex items-center justify-center border-2 border-dashed border-gray-300">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-16 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Riwayat</h3>
                                <p class="text-gray-500">Mulai menabung sampah untuk melihat riwayat transaksi Anda</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal untuk melihat gambar lebih besar -->
<div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center p-4 backdrop-blur-sm" onclick="closeImageModal()">
    <div class="relative max-w-5xl max-h-full">
        <button onclick="closeImageModal()" class="absolute -top-12 right-0 text-white hover:text-gray-300 transition-colors duration-200">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <img id="modalImage" src="" alt="Preview" class="max-w-full max-h-screen rounded-2xl shadow-2xl">
    </div>
</div>

<script>
function showImageModal(imageSrc) {
    document.getElementById('imageModal').classList.remove('hidden');
    document.getElementById('modalImage').src = imageSrc;
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    document.getElementById('imageModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal dengan ESC key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeImageModal();
    }
});
</script>

@endsection