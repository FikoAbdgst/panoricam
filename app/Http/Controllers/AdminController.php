<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        // Jika sudah login, redirect ke dashboard
        if (Session::has('admin_id')) {
            return redirect('/admin/dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cari admin berdasarkan email
        $admin = Admin::where('email', $request->email)->first();

        // Verifikasi password jika admin ditemukan
        if ($admin && Hash::check($request->password, $admin->password)) {
            // Simpan data admin di session
            Session::put('admin_id', $admin->id);
            Session::put('admin_name', $admin->name);
            Session::put('admin_email', $admin->email);

            return redirect('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout()
    {
        // Hapus semua data session admin
        Session::forget('admin_id');
        Session::forget('admin_name');
        Session::forget('admin_email');

        return redirect('/admin/login');
    }

    // Fungsi untuk mengecek apakah admin sudah login
    public static function checkAdminLogin()
    {
        return Session::has('admin_id');
    }
}
