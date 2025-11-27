@extends('layouts.app')

@section('title', 'Nabung Sampah')

@section('content')

<div class="p-10 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen flex items-center justify-center">

    <div class="max-w-2xl w-full bg-white rounded-2xl shadow-xl overflow-hidden">
        
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-8 py-6">
            <div class="flex items-center">
                <div class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">Form Nabung Sampah</h2>
                    <p class="text-green-100 text-sm mt-1">Isi data sampah yang akan ditabung</p>
                </div>
            </div>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
            <div class="mx-8 mt-6">
                <div class="p-4 bg-green-50 border-l-4 border-green-500 rounded-lg flex items-start">
                    <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <p class="font-semibold text-green-800">Berhasil!</p>
                        <p class="text-green-700 text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Form Section -->
        <form action="{{ route('nabung.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf

            <div class="space-y-6">

                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Nama Lengkap
                    </label>
                    <div class="relative">
                        <input type="text" value="{{ session('user.username') }}"
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 text-gray-700 font-medium focus:outline-none cursor-not-allowed" disabled>
                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Nama otomatis dari akun Anda</p>
                </div>

                <!-- Jenis Sampah -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        Jenis Sampah
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <div class="relative">
                        <select name="jenis_sampah" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-green-500 transition duration-200 appearance-none bg-white" required>
                            <option value="">-- Pilih jenis sampah --</option>
                            <option value="organik">Organik (Sisa makanan, daun, dll)</option>
                            <option value="anorganik">Anorganik (Plastik, kertas, kaleng, dll)</option>
                            <option value="b3">B3 / Rumah Tangga (Baterai, lampu, dll)</option>
                        </select>
                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Berat Sampah -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                        </svg>
                        Berat Sampah (kg)
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <div class="relative">
                        <input type="number" step="0.1" name="berat_sampah" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-green-500 transition duration-200" 
                               placeholder="Contoh: 2.5" required>
                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 font-medium">
                            kg
                        </div>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Masukkan berat dalam kilogram (misal: 0.5, 1.2, 3.0)</p>
                </div>

                <!-- Foto Sampah -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Foto Sampah
                        <span class="text-gray-500 text-xs ml-2">(Opsional)</span>
                    </label>
                    <div class="relative">
                        <input type="file" name="gambar" id="gambar" accept="image/*"
                               class="hidden"
                               onchange="previewImage(event)">
                        <label for="gambar" class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-green-500 hover:bg-green-50 transition duration-200 bg-gray-50">
                            <div id="imagePreview" class="hidden w-full h-full">
                                <img id="preview" src="" alt="Preview" class="w-full h-full object-cover rounded-lg">
                            </div>
                            <div id="uploadPlaceholder" class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="text-sm text-gray-600 font-medium">Klik untuk upload foto</p>
                                <p class="text-xs text-gray-500 mt-1">PNG, JPG, JPEG (Max. 5MB)</p>
                            </div>
                        </label>
                    </div>
                </div>

            </div>

            <!-- Submit Button -->
            <div class="mt-8 flex gap-3">
                <button type="submit" class="flex-1 bg-gradient-to-r from-green-600 to-green-700 text-white px-6 py-3 rounded-lg font-semibold hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 transition duration-200 flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Simpan Data Sampah
                </button>
                <button type="reset" class="px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 focus:outline-none transition duration-200">
                    Reset
                </button>
            </div>

        </form>

        <!-- Info Footer -->
        <div class="bg-green-50 px-8 py-4 border-t border-green-100">
            <div class="flex items-start text-sm text-green-800">
                <svg class="w-5 h-5 mr-2 flex-shrink-0 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p>Pastikan data yang Anda masukkan sudah benar. Foto sampah akan membantu proses verifikasi.</p>
            </div>
        </div>

    </div>

</div>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
            document.getElementById('imagePreview').classList.remove('hidden');
            document.getElementById('uploadPlaceholder').classList.add('hidden');
        }
        reader.readAsDataURL(file);
    }
}
</script>

@endsection