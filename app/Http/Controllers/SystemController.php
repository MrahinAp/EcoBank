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

    // 👇 Filter berdasarkan nama user
    $userName = $user['username']; // atau $user['nama'], sesuaikan dengan session Anda

    // Total poin
    $totalPoin = DB::table('tabungan_sampah')
                    ->where('nama', $userName) // ✅ Filter by nama
                    ->sum('point');

    // Total berat sampah
    $totalBerat = DB::table('tabungan_sampah')
                    ->where('nama', $userName)
                    ->sum('berat_sampah');

    // Statistik per jenis sampah
    $jenisSampah = DB::table('tabungan_sampah')
                      ->select('jenis_sampah', DB::raw('SUM(berat_sampah) as total'))
                      ->where('nama', $userName)
                      ->groupBy('jenis_sampah')
                      ->get();

    $artikels = Artikel::all();

    return view('user.dashboard_user', compact('user', 'totalPoin', 'totalBerat', 'jenisSampah', 'artikels'));
}



    // ======================================================
    // Dashboard Admin
    // ======================================================
    public function adminDashboard()
    {
        $user = Session::get('user');

        if (!$user || $user['role'] !== 'admin') {
            return redirect()->route('login')->with('error', 'Silakan login sebagai admin!');
        }

        return view('admin.dashboard_admin', compact('user'));
    }

    // ======================================================
    // Logout
    // ======================================================
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}
