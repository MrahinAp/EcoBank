<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TabunganSampah;

class TabunganController extends Controller
{
    public function index()
    {
        $user = session('user');
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login dulu!');
        }
        
        return view('user.nabung_user', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_sampah' => 'required',
            'berat_sampah' => 'required|numeric|min:0.1',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:4096',
        ]);

        $username = session('user.username');
        
        if (!$username) {
            return back()->with('error', 'Session expired. Silakan login kembali!');
        }

        // Hitung poin
        if ($request->jenis_sampah == 'organik' || $request->jenis_sampah == 'anorganik') {
            $poin = 10 * $request->berat_sampah;
        } else {
            $poin = 20 * $request->berat_sampah;
        }

        // Gambar Binary BLOB
        $gambarBlob = null;
        if ($request->hasFile('gambar')) {
            $gambarBlob = file_get_contents($request->file('gambar')->getRealPath());
        }

        try {
            // Simpan ke database
            TabunganSampah::create([
                'username' => $username,
                'jenis_sampah' => $request->jenis_sampah,
                'berat_sampah' => $request->berat_sampah,
                'point' => $poin,
                'gambar' => $gambarBlob,
            ]);

            return back()->with('success', 'Sampah berhasil ditabung!');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }
}