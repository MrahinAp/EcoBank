@extends('layouts.appa')

@section('title', 'Data Contact Admin')

@section('content')
<div class="bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Data Contact</h2>

    <div class="overflow-x-auto rounded-xl border border-gray-200">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-green-600 text-white text-left">
                    <th class="py-3 px-4">ID</th>
                    <th class="py-3 px-4">Nama</th>
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">Pesan</th>
                    <th class="py-3 px-4">Created At</th>
                    <th class="py-3 px-4">Updated At</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                        <td class="py-3 px-4">{{ $contact->id }}</td>
                        <td class="py-3 px-4">{{ $contact->nama }}</td>
                        <td class="py-3 px-4">{{ $contact->email }}</td>
                        <td class="py-3 px-4">{{ Str::limit($contact->pesan, 50) }}</td>
                        <td class="py-3 px-4">{{ $contact->created_at }}</td>
                        <td class="py-3 px-4">{{ $contact->updated_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-6 text-center text-gray-500">Tidak ada data contact.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
