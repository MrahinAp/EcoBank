@extends('layouts.appa')

@section('title', 'Kelola Admin - Data Login')

@section('content')

<div class="bg-white rounded-2xl shadow-lg p-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Data Pengguna</h2>
       <button onclick="openAddModal()"
         class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl text-sm shadow-md transition">
        + Tambah Pengguna
        </button>
    </div>

    <div class="overflow-x-auto rounded-xl border border-gray-200">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-green-600 text-white text-left">
                    <th class="py-3 px-4">ID</th>
                    <th class="py-3 px-4">Username</th>
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">No HP</th>
                    <th class="py-3 px-4">Role</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dataLogin as $login)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                        <td class="py-3 px-4">{{ $login->id }}</td>
                        <td class="py-3 px-4">{{ $login->username }}</td>
                        <td class="py-3 px-4">{{ $login->email }}</td>
                        <td class="py-3 px-4">{{ $login->no_hp }}</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 rounded-lg text-xs font-semibold
                                {{ $login->role === 'admin' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700' }}">
                                {{ ucfirst($login->role) }}
                            </span>
                        </td>

                        <td class="py-3 px-4 text-center">
                            <button 
                                onclick="openEditModal('{{ $login->id }}', '{{ $login->username }}', '{{ $login->email }}', '{{ $login->no_hp }}', '{{ $login->role }}')" 
                                class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                Edit
                            </button>

                            <form action="{{ route('admin.delete', $login->id) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded ml-2">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-6 text-center text-gray-500">Tidak ada data pengguna.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<!-- Modal Tambah -->
<div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow w-96">
        <h2 class="text-xl font-bold mb-4">Tambah Akun</h2>

        <form action="{{ route('admin.create') }}" method="POST">
            @csrf

            <label class="font-semibold">Username</label>
            <input type="text" name="username" class="w-full border rounded p-2 mb-2" required>

            <label class="font-semibold">Email</label>
            <input type="email" name="email" class="w-full border rounded p-2 mb-2" required>

            <label class="font-semibold">No HP</label>
            <input type="number" name="no_hp" class="w-full border rounded p-2 mb-2" required>

            <label class="font-semibold">Role</label>
            <input type="text" name="role" class="w-full border rounded p-2 mb-2" required>

            <label class="font-semibold">Password</label>
            <input type="password" name="password" class="w-full border rounded p-2 mb-4" required>

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeAddModal()" class="px-3 py-1 bg-gray-500 text-white rounded hover:bg-gray-600">Batal</button>
                <button type="submit" class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700">Tambah</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow w-96">
        <h2 class="text-xl font-bold mb-4">Edit Akun Admin</h2>

        <form action="{{ route('admin.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" id="edit_id">

            <label class="font-semibold">Username</label>
            <input type="text" id="edit_username" name="username" class="w-full border rounded p-2 mb-2">

            <label class="font-semibold">Email</label>
            <input type="email" id="edit_email" name="email" class="w-full border rounded p-2 mb-2">

            <label class="font-semibold">No HP</label>
            <input type="number" id="edit_hp" name="no_hp" class="w-full border rounded p-2 mb-2">

            <label class="font-semibold">Role</label>
            <input type="text" id="edit_role" name="role" class="w-full border rounded p-2 mb-2">

            <label class="font-semibold">Password</label>
            <input type="password" id="edit_password" name="password" class="w-full border rounded p-2 mb-4" placeholder="Kosongkan jika tidak diganti">

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeEditModal()" class="px-3 py-1 bg-gray-500 text-white rounded hover:bg-gray-600">Batal</button>
                <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(id, username, email, no_hp, role) {
        document.getElementById('edit_id').value = id;
        document.getElementById('edit_username').value = username;
        document.getElementById('edit_email').value = email;
        document.getElementById('edit_hp').value = no_hp;
        document.getElementById('edit_role').value = role;
        document.getElementById('edit_password').value = ""; 
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editModal').classList.add('flex');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editModal').classList.remove('flex');
    }

    function openAddModal() {
    document.getElementById('addModal').classList.remove('hidden');
    document.getElementById('addModal').classList.add('flex');
}

function closeAddModal() {
    document.getElementById('addModal').classList.add('hidden');
    document.getElementById('addModal').classList.remove('flex');
}

</script>

@endsection
