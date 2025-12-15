<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json([
            'message' => 'Pendaftaran berhasil!',
            'user' => [
                'id' => $user->id,
                'nama' => $user->nama, // ✅ HANYA 'nama', tidak ada 'name'
                'email' => $user->email,
                'role' => 'user'
            ]
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $email = $request->email;
        $password = $request->password;

        $admin = Admin::where('email', $email)->first();
        if ($admin && Hash::check($password, $admin->password)) {
            return response()->json([
                'message' => 'Login admin berhasil!',
                'user' => [
                    'id' => $admin->id,
                    'nama' => $admin->nama, // ✅ HANYA 'nama'
                    'email' => $admin->email,
                    'role' => 'admin'
                ]
            ]);
        }

        $user = User::where('email', $email)->first();
        if ($user && Hash::check($password, $user->password)) {
            return response()->json([
                'message' => 'Login user berhasil!',
                'user' => [
                    'id' => $user->id,
                    'nama' => $user->nama, // ✅ HANYA 'nama'
                    'email' => $user->email,
                    'role' => 'user'
                ]
            ]);
        }

        return response()->json(['message' => 'Email atau password salah.'], 401);
    }
}