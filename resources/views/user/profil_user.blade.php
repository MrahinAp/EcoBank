@extends('layouts.app')

@section('content')

<div class="p-10 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-10 rounded-2xl shadow-xl max-w-lg w-full border border-gray-200">

        <!-- Header -->
        <div class="text-center mb-8">
            <div class="w-24 h-24 bg-gradient-to-br from-green-500 to-green-700 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-800">Profil Saya</h2>
            <p class="text-gray-500 mt-2">Informasi akun Anda</p>
        </div>

        <!-- Profile Information -->
        <div class="space-y-6">
            
            <!-- Nama Pengguna -->
            <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Nama Pengguna
                </label>
                <div class="relative">
                    <input type="text" name="username" value="{{ $user['username'] }}" readonly
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-green-500 bg-gray-50 text-gray-800 font-medium transition duration-200">
                </div>
            </div>

            <!-- Email -->
            <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Email
                </label>
                <div class="relative">
                    <input type="email" name="email" value="{{ $user['email'] }}" readonly
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-green-500 bg-gray-50 text-gray-800 font-medium transition duration-200">
                </div>
            </div>

            <!-- Nomor HP -->
            <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    Nomor HP
                </label>
                <div class="relative">
                    <input type="text" name="no_hp" value="{{ $user['no_hp'] }}" readonly
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-green-500 bg-gray-50 text-gray-800 font-medium transition duration-200">
                </div>
            </div>

        </div>

        <!-- Footer Info -->
        <div class="mt-8 pt-6 border-t border-gray-200">
            <p class="text-center text-sm text-gray-500">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Informasi profil Anda
            </p>
        </div>

    </div>

</div>

@endsection