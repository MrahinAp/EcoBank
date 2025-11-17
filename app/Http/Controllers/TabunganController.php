<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TabunganSampah;

class TabunganController extends Controller
{
    public function index()
    {
        return view('user.nabung_user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_sampah' => 'required',
            'berat_sampah' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:4096',
        ]);

        $nama = session('user.username');

        // Hitung poin
        if ($request->jenis_sampah == 'organik' || $request->jenis_sampah == 'anorganik') {
            $poin = 10 * $request->berat_sampah;
        } else {
            $poin = 20 * $request->berat_sampah;
        }

        // Gambar Binary BLOB
        $gambarBlob = null;
        if ($request->hasFile('gambar')) {
            $gambarBlob = file_get_contents($request->file('gambar')->path());
        }

        // Simpan ke database
        TabunganSampah::create([
            'nama' => $nama,
            'jenis_sampah' => $request->jenis_sampah,
            'berat_sampah' => $request->berat_sampah,
            'point' => $poin,
            'gambar' => $gambarBlob,
        ]);

        return back()->with('success', 'Sampah berhasil ditabung! 👍');
    }
}
