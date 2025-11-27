<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Artikel;

class SystemController extends Controller
{
    // ======================================================
    // Login user/admin
    // ======================================================
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = DB::table('login')->where('username', $username)->first();

        if (!$user) {
            return back()->with('error', 'Username tidak ditemukan!');
        }

        if (!Hash::check($password, $user->password)) {
            return back()->with('error', 'Password salah!');
        }

        Session::put('user', [
            'id' => $user->id,
            'username' => $user->username,
            'role' => $user->role,
            'email' => $user->email,
            'no_hp' => $user->no_hp
        ]);

        return $user->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.dashboard');
    }

    // ======================================================
    // Register user
    // ======================================================
    public function registerProcess(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:login,username',
            'password' => 'required|min:4',
            'email' => 'required|email|unique:login,email',
            'no_hp'  => 'required'
        ]);

        DB::table('login')->insert([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'role' => 'user'
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat!');
    }

    // ======================================================
    // Dashboard User
    // ======================================================
    public function userDashboard()
    {
        $user = Session::get('user');

        if (!$user || $user['role'] !== 'user') {
            return redirect()->route('login')->with('error', 'Silakan login sebagai user!');
        }

        $userName = $user['username'];

        $totalPoin = DB::table('tabungan_sampah')->where('username', $userName)->sum('point');
        $totalBerat = DB::table('tabungan_sampah')->where('username', $userName)->sum('berat_sampah');

        $jenisSampah = DB::table('tabungan_sampah')
            ->select('jenis_sampah', DB::raw('SUM(berat_sampah) as total'))
            ->where('username', $userName)
            ->groupBy('jenis_sampah')
            ->get();

        $artikels = Artikel::all();

        return view('user.dashboard_user', compact('user', 'totalPoin', 'totalBerat', 'jenisSampah', 'artikels'));
    }

    // ======================================================
    // Dashboard Admin (DIMODIFIKASI)
    // ======================================================
    public function adminDashboard()
    {
        $user = Session::get('user');

        if (!$user || $user['role'] !== 'admin') {
            return redirect()->route('login')->with('error', 'Silakan login sebagai admin!');
        }

        // Hitung total pengguna (role = 'user')
        $totalUsers = DB::table('login')->where('role', 'user')->count();

        // Hitung total berat sampah keseluruhan
        $totalBerat = DB::table('tabungan_sampah')->sum('berat_sampah');

        // Hitung total poin keseluruhan
        $totalPoin = DB::table('tabungan_sampah')->sum('point');

        // Ambil data jenis sampah keseluruhan
        $jenisSampah = DB::table('tabungan_sampah')
            ->select('jenis_sampah', DB::raw('SUM(berat_sampah) as total'))
            ->groupBy('jenis_sampah')
            ->get();

        // Siapkan data admin untuk view
        $admin = $user;

        return view('admin.dashboard_admin', compact('admin', 'totalUsers', 'totalBerat', 'totalPoin', 'jenisSampah'));
    }

    // ======================================================
    // HALAMAN PROFIL USER
    // ======================================================
    public function profilUser()
    {
        $user = Session::get('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login dulu!');
        }

        return view('user.profil_user', compact('user'));
    }

    // ======================================================
    // Logout
    // ======================================================
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('welcome')->with('success', 'Berhasil logout!');
    }

    public function riwayatUser()
    {
        // Ambil user dari session
        $user = Session::get('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login dulu!');
        }

        $userName = $user['username'];

        // Ambil riwayat berdasarkan username di tabungan_sampah
        $riwayat = DB::table('tabungan_sampah')
                    ->where('username', $userName)
                    ->orderBy('created_at', 'desc')
                    ->get();

        // Konversi gambar LONGBLOB ke base64
        foreach ($riwayat as $item) {
            if ($item->gambar) {
                $item->gambar_base64 = 'data:image/jpeg;base64,' . base64_encode($item->gambar);
            }
        }

        // Total berat
        $total_berat = DB::table('tabungan_sampah')
                        ->where('username', $userName)
                        ->sum('berat_sampah');

        // Total point
        $total_point = DB::table('tabungan_sampah')
                        ->where('username', $userName)
                        ->sum('point');

        return view('user.riwayat_user', compact('riwayat', 'total_berat', 'total_point', 'user'));
    }

    public function contact(Request $req)
    {
        $req->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required'
        ]);

        DB::table('contacts')->insert([
            'nama' => $req->nama,
            'email' => $req->email,
            'pesan' => $req->pesan,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return back()->with('success', 'Pesan berhasil dikirim!');
    }

    public function kelolaAdmin()
{
    $user = Session::get('user');

    if (!$user || $user['role'] !== 'admin') {
        return redirect()->route('login')->with('error', 'Silakan login sebagai admin!');
    }

    // Ambil semua akun dari tabel login
    $dataLogin = DB::table('login')->get();

    return view('admin.kelola_admin', compact('user', 'dataLogin'));
}

public function updateAdmin(Request $request)
{
    $data = [
        'username' => $request->username,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
        'role' => $request->role,
        'updated_at' => now()
    ];

    // Jika password diisi → hash dan update
    if (!empty($request->password)) {
        $data['password'] = Hash::make($request->password);
    }

    DB::table('login')->where('id', $request->id)->update($data);

    return back()->with('success', 'Akun berhasil diperbarui!');
}


public function deleteAdmin($id)
{
    DB::table('login')->where('id', $id)->delete();
    return back()->with('success', 'Akun berhasil dihapus!');
}


public function create(Request $request)
{
    $request->validate([
        'username' => 'required',
        'email' => 'required|email',
        'no_hp' => 'required',
        'role' => 'required',
        'password' => 'required'
    ]);

    DB::table('login')->insert([
        'username' => $request->username,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
        'role' => $request->role,
        'password' => Hash::make($request->password),
    ]);

    return back()->with('success', 'Akun berhasil dibuat!');
}

public function kelolaSampah()
{
    $tabungan = DB::table('tabungan_sampah')->get();
    return view('admin.kelolasampah_admin', compact('tabungan'));
}


// Menampilkan artikel
// Menampilkan artikel
public function kelolaArtikel()
{
    $artikels = Artikel::all();
    return view('admin.kelolartikel_admin', compact('artikels'));
}

// Tambah artikel
public function storeArtikel(Request $request)
{
    $request->validate([
        'judul' => 'required|string',
        'deskripsi' => 'required|string',
        'link_artikel' => 'nullable|url',
        'gambar' => 'nullable|image|max:2048',
    ]);

    $artikel = new Artikel();
    $artikel->judul = $request->judul;
    $artikel->deskripsi = $request->deskripsi;
    $artikel->link_artikel = $request->link_artikel;

    if ($request->hasFile('gambar')) {
        $artikel->gambar = file_get_contents($request->file('gambar')->getRealPath());
    }

    $artikel->save();

    return redirect()->route('admin.kelola.artikel')->with('success', 'Artikel berhasil ditambahkan!');
}

// Update artikel
public function updateArtikel(Request $request)
{
    $request->validate([
        'id' => 'required|exists:artikels,id',
        'judul' => 'required|string',
        'deskripsi' => 'required|string',
        'link_artikel' => 'nullable|url',
        'gambar' => 'nullable|image|max:2048',
    ]);

    $artikel = Artikel::findOrFail($request->id);
    $artikel->judul = $request->judul;
    $artikel->deskripsi = $request->deskripsi;
    $artikel->link_artikel = $request->link_artikel;

    if ($request->hasFile('gambar')) {
        $artikel->gambar = file_get_contents($request->file('gambar')->getRealPath());
    }

    $artikel->save();

    return redirect()->route('admin.kelola.artikel')->with('success', 'Artikel berhasil diupdate!');
}

// Hapus artikel
public function deleteArtikel($id)
{
    $artikel = Artikel::findOrFail($id);
    $artikel->delete();

    return redirect()->route('admin.kelola.artikel')->with('success', 'Artikel berhasil dihapus!');
}

public function contactAdmin()
{
    $contacts = DB::table('contacts')->orderBy('created_at', 'desc')->get();
    return view('admin.contact_admin', compact('contacts'));
}

}
