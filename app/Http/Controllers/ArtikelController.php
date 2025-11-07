<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'link_artikel' => 'nullable|url',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->only(['judul','deskripsi','link_artikel']);

        // Simpan gambar sebagai BLOB di DB
        if ($request->hasFile('gambar')) {
            $data['gambar'] = file_get_contents($request->file('gambar')->getRealPath());
        }

        Artikel::create($data);

        return redirect()->route('artikel.index')->with('success','Artikel berhasil ditambahkan!');
    }

    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'link_artikel' => 'nullable|url',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->only(['judul','deskripsi','link_artikel']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = file_get_contents($request->file('gambar')->getRealPath());
        }

        $artikel->update($data);

        return redirect()->route('artikel.index')->with('success','Artikel berhasil diperbarui!');
    }
}
