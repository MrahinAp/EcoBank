<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EcoBank - Menabung sampah, panen rupiah</title>
    
    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    
    {{-- Custom Tailwind Config --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'ecobank-green': '#166534',
                        'ecobank-yellow': '#febc2f',
                        'ecobank-light': '#ebfde0',
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                        'abril': ['Abril Fatface', 'serif'],
                    }
                }
            }
        }
    </script>
    
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Abril+Fatface&display=swap" rel="stylesheet">
</head>
<body class="font-poppins bg-white">
    
    {{-- Navbar --}}
    <nav class="fixed top-0 left-0 right-0 bg-white/95 backdrop-blur-sm shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                {{-- Logo --}}
                <div class="flex items-center">
                    <span class="font-abril text-3xl text-ecobank-yellow">EcoBank</span>
                </div>
                
                {{-- Navigation Links --}}
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-ecobank-green transition font-medium">Home</a>
                    <a href="#about" class="text-gray-700 hover:text-ecobank-green transition font-medium">About</a>
                    <a href="#article" class="text-gray-700 hover:text-ecobank-green transition font-medium">Article</a>
                    <a href="#gallery" class="text-gray-700 hover:text-ecobank-green transition font-medium">Gallery</a>
                    <a href="#contact" class="text-gray-700 hover:text-ecobank-green transition font-medium">Contact</a>
                </div>
                
                {{-- Login Button --}}
                <div>
                   
                </div>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section id="home" class="relative min-h-screen flex items-center pt-20 overflow-hidden">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero.png') }}" alt="Hero Background" class="w-full h-full object-cover opacity-100" />
            <div class="absolute inset-0 bg-gradient-to-r from-white/80 to-transparent"></div>
        </div>
        
        {{-- Decorative Elements --}}
        <img src="{{ asset('images/kupu-kupu.png') }}" alt="Butterfly" class="absolute top-1/2 right-1/4 w-16 h-auto animate-bounce hidden lg:block z-10" />
        <img src="{{ asset('images/daun pojok kiri.png') }}" alt="Leaves" class="absolute bottom-0 left-0 w-64 h-auto opacity-100 hidden lg:block z-10" />
        <img src="{{ asset('images/two_green_trees.png') }}" alt="tree" class="absolute top-1/3 left-0 w-48 h-auto opacity-100 hidden lg:block z-10" />
        {{-- Hero Content --}}
        <div class="relative z-20 max-w-7xl mx-auto px-6 lg:px-8 py-20">
            <div class="max-w-2xl">
                <h1 class="font-abril text-6xl lg:text-7xl text-ecobank-yellow mb-6 leading-tight">
                    EcoBank
                </h1>
                <p class="text-2xl lg:text-3xl text-gray-800 mb-8">
                    Menabung sampah, panen rupiah
                </p>
                <p class="text-lg text-gray-600 mb-10 leading-relaxed">
                    Bergabunglah dengan gerakan hijau untuk masa depan yang lebih bersih. 
                    Tukarkan sampah Anda menjadi penghasilan sambil menjaga lingkungan.
                </p>
                <div class="flex flex-wrap gap-4">
                   <a href="/login" class="bg-ecobank-green text-white px-8 py-4 rounded-lg font-semibold hover:bg-green-800 transition shadow-lg">
                        Mulai Sekarang
                    </a>
                    
                </div>
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section id="about" class="py-20 bg-ecobank-light">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold mb-4">
                    <span class="text-gray-900">About</span>
                    <span class="text-ecobank-yellow"> EcoBank</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Platform inovatif yang mengubah cara Anda memandang sampah
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8 mb-12">
                {{-- Card 1 --}}
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-ecobank-yellow rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Dapatkan Penghasilan</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Tukarkan sampah yang Anda kumpulkan menjadi uang tunai atau saldo digital yang bisa digunakan kapan saja.
                    </p>
                </div>
                
                {{-- Card 2 --}}
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-ecobank-green rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Selamatkan Bumi</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Setiap sampah yang Anda setorkan membantu mengurangi pencemaran lingkungan dan melindungi ekosistem kita.
                    </p>
                </div>
            </div>
            
            {{-- Large Card --}}
            <div class="bg-white p-10 rounded-2xl shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Bagaimana Cara Kerjanya?</h3>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-ecobank-yellow rounded-full flex items-center justify-center mx-auto mb-4 text-white font-bold text-xl">1</div>
                        <h4 class="font-semibold text-lg mb-2">Kumpulkan Sampah</h4>
                        <p class="text-gray-600 text-sm">Pisahkan dan kumpulkan sampah yang bisa didaur ulang</p>
                    </div>
                    <div class="text-center">
                        <div class="w-12 h-12 bg-ecobank-yellow rounded-full flex items-center justify-center mx-auto mb-4 text-white font-bold text-xl">2</div>
                        <h4 class="font-semibold text-lg mb-2">Setor ke Bank Sampah</h4>
                        <p class="text-gray-600 text-sm">Bawa sampah Anda ke lokasi bank sampah terdekat</p>
                    </div>
                    <div class="text-center">
                        <div class="w-12 h-12 bg-ecobank-yellow rounded-full flex items-center justify-center mx-auto mb-4 text-white font-bold text-xl">3</div>
                        <h4 class="font-semibold text-lg mb-2">Dapatkan Reward</h4>
                        <p class="text-gray-600 text-sm">Terima pembayaran langsung ke akun EcoBank Anda</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Article Section --}}
    <section id="article" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Education Article</h2>
                <p class="text-lg text-gray-600">Pelajari lebih lanjut tentang pengelolaan sampah dan lingkungan</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($artikels as $artikel)
                {{-- Article Card --}}
                <div class="bg-ecobank-yellow rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition transform hover:-translate-y-2">
                    {{-- Tampilkan gambar dari longblob --}}
                    @if($artikel->gambar)
                        <img src="data:image/jpeg;base64,{{ base64_encode($artikel->gambar) }}" alt="{{ $artikel->judul }}" class="w-full h-48 object-cover" />
                    @else
                        {{-- Fallback jika tidak ada gambar --}}
                        <div class="h-48 bg-gradient-to-br from-yellow-400 to-ecobank-yellow"></div>
                    @endif
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-3 text-gray-900">{{ $artikel->judul }}</h3>
                        <p class="text-gray-700 mb-4 text-sm">{{ $artikel->deskripsi }}</p>
                        <a href="{{ $artikel->link_artikel }}" class="text-ecobank-green font-semibold hover:underline">Baca Selengkapnya →</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Gallery Section --}}
    <section id="gallery" class="py-20 bg-ecobank-light">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Gallery Activity</h2>
                <p class="text-lg text-gray-600">Dokumentasi kegiatan dan pencapaian EcoBank</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                {{-- Gallery Item 1 --}}
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition">
                    <div class="h-64 bg-gradient-to-br from-green-200 to-green-400"></div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">Kegiatan Penyuluhan Lingkungan</h3>
                        <p class="text-gray-600 text-sm">Edukasi masyarakat tentang pentingnya pengelolaan sampah</p>
                    </div>
                </div>
                
                {{-- Gallery Item 2 --}}
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition">
                    <div class="h-64 bg-gradient-to-br from-blue-200 to-blue-400"></div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">Workshop Daur Ulang Kreatif</h3>
                        <p class="text-gray-600 text-sm">Mengubah sampah menjadi produk bernilai ekonomi</p>
                    </div>
                </div>
                
                {{-- Gallery Item 3 --}}
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition">
                    <div class="h-64 bg-gradient-to-br from-yellow-200 to-yellow-400"></div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">Pembagian Reward Nasabah</h3>
                        <p class="text-gray-600 text-sm">Apresiasi untuk nasabah setia EcoBank</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Section --}}
    <section id="contact" class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center">
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">Siap Bergabung dengan EcoBank?</h2>
            <p class="text-lg text-gray-600 mb-10">
                Mulai perjalanan Anda menuju lingkungan yang lebih bersih dan penghasilan tambahan hari ini!
            </p>
            <button class="bg-ecobank-yellow text-gray-900 px-12 py-4 rounded-lg font-bold text-xl hover:bg-yellow-500 transition shadow-lg">
                Contact Us
            </button>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-ecobank-green text-white py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="font-abril text-2xl text-ecobank-yellow mb-4">EcoBank</h3>
                    <p class="text-green-100 text-sm">Menabung sampah, panen rupiah. Bersama kita wujudkan Indonesia lebih bersih.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm text-green-100">
                        <li><a href="#home" class="hover:text-ecobank-yellow transition">Home</a></li>
                        <li><a href="#about" class="hover:text-ecobank-yellow transition">About</a></li>
                        <li><a href="#article" class="hover:text-ecobank-yellow transition">Article</a></li>
                        <li><a href="#gallery" class="hover:text-ecobank-yellow transition">Gallery</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Layanan</h4>
                    <ul class="space-y-2 text-sm text-green-100">
                        <li><a href="#" class="hover:text-ecobank-yellow transition">Setor Sampah</a></li>
                        <li><a href="#" class="hover:text-ecobank-yellow transition">Tarik Saldo</a></li>
                        <li><a href="#" class="hover:text-ecobank-yellow transition">Edukasi</a></li>
                        <li><a href="#" class="hover:text-ecobank-yellow transition">Bantuan</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Hubungi Kami</h4>
                    <ul class="space-y-2 text-sm text-green-100">
                        <li>Email: info@ecobank.id</li>
                        <li>Telp: (021) 1234-5678</li>
                        <li>Alamat: Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-green-700 pt-8 text-center text-sm text-green-100">
                <p>&copy; 2024 EcoBank. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
