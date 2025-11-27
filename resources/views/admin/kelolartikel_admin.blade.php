@extends('layouts.appa')

@section('title', 'Kelola Artikel Admin')

@section('content')
<div class="bg-white rounded-2xl shadow-lg p-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Data Artikel</h2>
        <button onclick="openAddModal()"
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl text-sm shadow-md transition">
           + Tambah Artikel
        </button>
    </div>

    <div class="overflow-x-auto rounded-xl border border-gray-200">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-green-600 text-white text-left">
                    <th class="py-3 px-4">ID</th>
                    <th class="py-3 px-4">Judul</th>
                    <th class="py-3 px-4">Deskripsi</th>
                    <th class="py-3 px-4">Link Artikel</th>
                    <th class="py-3 px-4">Gambar</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($artikels as $artikel)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                        <td class="py-3 px-4">{{ $artikel->id }}</td>
                        <td class="py-3 px-4">{{ $artikel->judul }}</td>
                        <td class="py-3 px-4">{{ Str::limit($artikel->deskripsi, 50) }}</td>
                        <td class="py-3 px-4">
                            @if($artikel->link_artikel)
                                <a href="{{ $artikel->link_artikel }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                            @else
                                <span class="text-gray-400 text-xs">Tidak ada</span>
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            @if($artikel->gambar)
                                <img src="data:image/jpeg;base64,{{ base64_encode($artikel->gambar) }}" alt="gambar" class="w-16 h-16 object-cover rounded border shadow-sm">
                            @else
                                <span class="text-gray-400 text-xs">Tidak ada</span>
                            @endif
                        </td>
                       <td class="py-3 px-4 text-center">
                  <div class="flex justify-center gap-2">
                  <button 
                     onclick="openEditModal('{{ $artikel->id }}', '{{ addslashes($artikel->judul) }}', '{{ addslashes($artikel->deskripsi) }}', '{{ $artikel->link_artikel }}')" 
                     class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded transition">
                       Edit
                    </button>

                <form action="{{ route('admin.artikel.delete', $artikel->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                     @csrf
                    @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition">
                  Hapus
                </button>
        </form>
    </div>
</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-6 text-center text-gray-500">Tidak ada data artikel.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Artikel -->
<div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow w-96">
        <h2 class="text-xl font-bold mb-4">Tambah Artikel</h2>
        <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="font-semibold">Judul</label>
            <input type="text" name="judul" class="w-full border rounded p-2 mb-2" required>

            <label class="font-semibold">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded p-2 mb-2" rows="4" required></textarea>

            <label class="font-semibold">Link Artikel</label>
            <input type="text" name="link_artikel" class="w-full border rounded p-2 mb-2">

            <label class="font-semibold">Gambar</label>
            <input type="file" name="gambar" accept="image/*" class="w-full border rounded p-2 mb-4">

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeAddModal()" class="px-3 py-1 bg-gray-500 text-white rounded hover:bg-gray-600">Batal</button>
                <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Artikel -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow w-96">
        <h2 class="text-xl font-bold mb-4">Edit Artikel</h2>
        <form action="{{ route('admin.artikel.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="edit_id">

            <label class="font-semibold">Judul</label>
            <input type="text" id="edit_judul" name="judul" class="w-full border rounded p-2 mb-2" required>

            <label class="font-semibold">Deskripsi</label>
            <textarea id="edit_deskripsi" name="deskripsi" class="w-full border rounded p-2 mb-2" rows="4" required></textarea>

            <label class="font-semibold">Link Artikel</label>
            <input type="text" id="edit_link" name="link_artikel" class="w-full border rounded p-2 mb-2">

            <label class="font-semibold">Gambar</label>
            <input type="file" id="edit_gambar" name="gambar" accept="image/*" class="w-full border rounded p-2 mb-4">

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeEditModal()" class="px-3 py-1 bg-gray-500 text-white rounded hover:bg-gray-600">Batal</button>
                <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
function openAddModal() {
    document.getElementById('addModal').classList.remove('hidden');
    document.getElementById('addModal').classList.add('flex');
}
function closeAddModal() {
    document.getElementById('addModal').classList.add('hidden');
    document.getElementById('addModal').classList.remove('flex');
}

function openEditModal(id, judul, deskripsi, link) {
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_judul').value = judul;
    document.getElementById('edit_deskripsi').value = deskripsi;
    document.getElementById('edit_link').value = link;
    document.getElementById('edit_gambar').value = "";
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editModal').classList.add('flex');
}
function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
    document.getElementById('editModal').classList.remove('flex');
}
</script>
@endsection
