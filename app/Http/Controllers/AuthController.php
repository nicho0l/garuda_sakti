<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Proses Register Akun Baru
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name'     => 'required|string|max:255',
                'email'    => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
            ]);

            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'role'     => 'pelanggan', // Default role pelanggan
            ]);

            // Langsung login setelah daftar
            Auth::login($user);

            return response()->json([
                'status'  => 'success',
                'message' => 'Pendaftaran berhasil! Anda berhasil masuk.',
                'user'    => $user
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status'  => 'error',
                'message' => implode(', ', array_merge(...array_values($e->errors())))
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Gagal menyimpan ke database: ' . $e->getMessage()
            ], 500);
        }
    }

    // Proses Login
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Tentukan URL tujuan berdasarkan role
            $redirectUrl = ($user->role === 'admin') ? route('admin.dashboard') : '/';

            return response()->json([
                'status'       => 'success',
                'message'      => 'Selamat datang kembali, ' . $user->name . '!',
                'redirect_url' => $redirectUrl,
                'user'         => $user
            ]);
        }

        return response()->json([
            'status'  => 'error',
            'message' => 'Email atau password salah!'
        ], 401);
    }

    // Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}