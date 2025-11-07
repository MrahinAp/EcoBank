<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash; // biar password aman
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

        // Cari user di tabel login
        $user = DB::table('login')->where('username', $username)->first();

        if (!$user) {
            return back()->with('error', 'Username tidak ditemukan!');
        }

        if (!Hash::check($password, $user->password)) {
            return back()->with('error', 'Password salah!');
        }

        // Simpan session user sebagai array
        Session::put('user', [
            'id' => $user->id,
            'username' => $user->username,
            'role' => $user->role,
            'email' => $user->email ?? null,
            'no_hp' => $user->no_hp ?? null
        ]);

        // Redirect sesuai role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');
    }

    // ======================================================
    // Register user
    // ======================================================
    public function registerProcess(Request $request)
    {
        // Validasi sederhana
        $request->validate([
            'username' => 'required|unique:login,username',
            'password' => 'required|min:4',
            'email' => 'required|email|unique:login,email',
            'no_hp'  => 'required'
        ]);

        // Simpan user baru
        DB::table('login')->insert([
            'username' => $request->username,
            'password' => Hash::make($request->password), // hash password
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'role' => 'user'
        ]);

        // Redirect ke login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login.');
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

        $artikels = Artikel::all();
        return view('user.dashboard_user', compact('user', 'artikels'));
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
