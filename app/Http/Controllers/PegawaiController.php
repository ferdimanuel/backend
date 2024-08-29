<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cari pegawai berdasarkan NIP
        $pegawai = Pegawai::where('nip', $validated['nip'])->first();

        // Verifikasi password
        if (!$pegawai || !Hash::check($validated['password'], $pegawai->password)) {
            return response()->json(['message' => 'NIP atau password salah'], 401);
        }

        // Buat token API
        $token = $pegawai->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token, 'pegawai' => $pegawai], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    public function show($id)
    {
        return Pegawai::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string',
            'nip' => 'required|string|unique:pegawai,nip',
            'jabatan' => 'required|string',
            'ruangan' => 'required|string',
            'alamat' => 'required|string',
            'awal_masuk_kerja' => 'required|date',
            'email' => 'required|email|unique:pegawai,email',
            'no_handphone' => 'required|string|unique:pegawai,no_handphone',
            'password' => 'required|string|min:8',
        ]);

        $pegawai = Pegawai::create([
            'nama_lengkap' => $validated['nama_lengkap'],
            'nip' => $validated['nip'],
            'jabatan' => $validated['jabatan'],
            'ruangan' => $validated['ruangan'],
            'alamat' => $validated['alamat'],
            'awal_masuk_kerja' => $validated['awal_masuk_kerja'],
            'email' => $validated['email'],
            'no_handphone' => $validated['no_handphone'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json($pegawai, 201);
    }

    // Tambahkan metode lain jika diperlukan, seperti index, update, destroy
}
