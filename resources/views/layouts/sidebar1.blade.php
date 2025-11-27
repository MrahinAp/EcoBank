<aside class="fixed left-0 top-0 w-72 bg-gradient-to-b from-green-700 to-green-800 text-white p-6 flex flex-col gap-6 h-screen overflow-y-auto shadow-2xl">

    <!-- Header -->
    <div class="mb-4">
        <div class="flex items-center gap-3 bg-white/10 rounded-xl p-4 backdrop-blur-sm">
            <div class="w-12 h-12 rounded-full bg-green-200/20 flex items-center justify-center border-2 border-white/30">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="text-white">
                    <path d="M3 21s4-4 9-4 9 4 9 4" stroke="white" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13 7c0 0 3.5-6 8-3-2 3-3 7-3 7"
                          stroke="white" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div>
                <h1 class="font-bold text-xl">EcoBank</h1>
                <p class="text-xs text-green-200">Dashboard Admin</p>
            </div>
        </div>
    </div>

    <!-- User Info -->
   
    <!-- Menu -->
    <nav class="flex-1">
        <ul class="space-y-2">

            <!-- Home / Beranda -->
            <li>
                <a href="{{ route('welcome') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl 
                   {{ request()->routeIs('welcome') ? 'bg-white/20 shadow-lg' : 'hover:bg-white/10' }} 
                   transition-all duration-200 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="font-medium group-hover:translate-x-1 transition-transform duration-200">Beranda</span>
                </a>
            </li>

            <!-- Dashboard -->
            <li>
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl 
                   {{ request()->routeIs('admin.dashboard') ? 'bg-white/20 shadow-lg' : 'hover:bg-white/10' }} 
                   transition-all duration-200 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 16a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-3zM14 13a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1h-4a1 1 0 01-1-1v-7z" />
                    </svg>
                    <span class="font-medium group-hover:translate-x-1 transition-transform duration-200">Dashboard</span>
                </a>
            </li>

            <!-- Profile -->
            <li>
                <a href="{{ route('admin.kelola') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl 
                   {{ request()->routeIs('admin.kelola') ? 'bg-white/20 shadow-lg' : 'hover:bg-white/10' }} 
                   transition-all duration-200 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="font-medium group-hover:translate-x-1 transition-transform duration-200">kelola user</span>
                </a>
            </li>

            <!-- kelola Sampah -->
            <li>
                <a href="{{ route('admin.kelola.sampah') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl 
                   {{ request()->routeIs('admin.kelola.sampah') ? 'bg-white/20 shadow-lg' : 'hover:bg-white/10' }} 
                   transition-all duration-200 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium group-hover:translate-x-1 transition-transform duration-200">kelola sampah</span>
                </a>
            </li>

            <!-- kelola artikel -->
            <li>
                <a href="{{ route('admin.kelola.artikel') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl 
                   {{ request()->routeIs('admin.kelola.artikel') ? 'bg-white/20 shadow-lg' : 'hover:bg-white/10' }} 
                   transition-all duration-200 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium group-hover:translate-x-1 transition-transform duration-200">kelola artikel</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.contact') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl 
                   {{ request()->routeIs('admin.contact') ? 'bg-white/20 shadow-lg' : 'hover:bg-white/10' }} 
                   transition-all duration-200 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium group-hover:translate-x-1 transition-transform duration-200">kelola contact</span>
                </a>
            </li>

        </ul>
        </ul>
    </nav>

    <!-- Logout Button -->
    <div class="border-t border-white/20 pt-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" 
                    onclick="return confirm('Yakin ingin logout?')" 
                    class="w-full flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-red-500/20 transition-all duration-200 group text-red-200 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="font-medium group-hover:translate-x-1 transition-transform duration-200">Logout</span>
            </button>
        </form>
    </div>

</aside>