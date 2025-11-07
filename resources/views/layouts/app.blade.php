<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') - EcoBank</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">
  <div class="flex min-h-screen">
    @include('layouts.sidebar')

    <!-- Tambahkan ml-72 untuk memberi ruang pada sidebar yang fixed -->
    <main class="flex-1 ml-72 p-8 overflow-y-auto">
      @yield('content')
    </main>
  </div>
</body>
</html>