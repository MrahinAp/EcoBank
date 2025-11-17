<aside class="fixed left-0 top-0 w-72 bg-green-700 text-white p-6 flex flex-col gap-6 h-screen overflow-y-auto">

    <!-- Header -->
    <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-full bg-green-200/20 flex items-center justify-center">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="text-white">
                <path d="M3 21s4-4 9-4 9 4 9 4" stroke="white" stroke-width="1.5"
                      stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13 7c0 0 3.5-6 8-3-2 3-3 7-3 7"
                      stroke="white" stroke-width="1.5"
                      stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div>
            <h1 class="font-bold text-lg">Bank Sampah</h1>
            <p class="text-xs text-green-200/80">Dashboard User</p>
        </div>
    </div>

    <!-- Menu -->
    <nav class="flex-1">
        <ul class="space-y-2">

            <!-- Profile -->
            <li>
                <a href="#"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/5 transition">
                    <svg class="w-5 h-5 opacity-90" viewBox="0 0 24 24" fill="none">
                        <path d="M12 12a5 5 0 100-10 5 5 0 000 10zM3 22a9 9 0 0118 0"
                              stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                    </svg>
                    <span class="font-medium">Profil</span>
                </a>
            </li>

            <!-- Dashboard -->
            <li>
                <a href="{{ route('user.dashboard') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg 
                   {{ request()->routeIs('user.dashboard') ? 'bg-green-600' : 'hover:bg-white/5' }} transition">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                        <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"
                              stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 22V12h6v10"
                              stroke="white" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>
            </li>

            <!-- Nabung Sampah -->
            <li>
                <a href="{{ route('nabung.form') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg 
                   {{ request()->routeIs('nabung.form') ? 'bg-green-600' : 'hover:bg-white/5' }} transition">
                    <svg class="w-5 h-5 opacity-90" viewBox="0 0 24 24" fill="none">
                        <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"
                              stroke="white" stroke-width="1.2" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M12 11v6m-3-3h6"
                              stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                    </svg>
                    <span class="font-medium">Nabung Sampah</span>
                </a>
            </li>

            <!-- Riwayat -->
            <li>
                <a href=""
                   class="flex items-center gap-3 px-3 py-2 rounded-lg 
                   {{ request()->routeIs('riwayat.user') ? 'bg-green-600' : 'hover:bg-white/5' }} transition">
                    <svg class="w-5 h-5 opacity-90" viewBox="0 0 24 24" fill="none">
                        <path d="M3 7h18M3 12h18M3 17h18"
                              stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                    </svg>
                    <span class="font-medium">Riwayat</span>
                </a>
            </li>

        </ul>
    </nav>

    <!-- User info -->
    <div class="text-xs text-green-200/80">
        <p>Logged in as</p>
        <p class="font-semibold">{{ Session::get('username') }}</p>
    </div>
</aside>
