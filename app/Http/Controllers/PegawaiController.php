<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    // Metode untuk menampilkan semua data pegawai
    public function index()
    {
        $pegawai = Pegawai::all();
        return response()->json($pegawai, 200);
    }

    // Metode untuk login
    public function login(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string',
            'password' => 'required|string',
        ]);

        $pegawai = Pegawai::where('nip', $validated['nip'])->first();

        if (!$pegawai || !Hash::check($validated['password'], $pegawai->password)) {
            return response()->json(['message' => 'NIP atau password salah'], 401);
        }

        $token = $pegawai->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token, 'pegawai' => $pegawai], 200);
    }

    // Metode untuk logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    // Metode untuk menampilkan data pegawai berdasarkan ID
    public function show($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return response()->json($pegawai, 200);
    }

    // Metode untuk menambah data pegawai baru
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

    // Metode untuk mengupdate data pegawai berdasarkan ID
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $validated = $request->validate([
            'nama_lengkap' => 'sometimes|required|string',
            'nip' => 'sometimes|required|string|unique:pegawai,nip,' . $pegawai->id,
            'jabatan' => 'sometimes|required|string',
            'ruangan' => 'sometimes|required|string',
            'alamat' => 'sometimes|required|string',
            'awal_masuk_kerja' => 'sometimes|required|date',
            'email' => 'sometimes|required|email|unique:pegawai,email,' . $pegawai->id,
            'no_handphone' => 'sometimes|required|string|unique:pegawai,no_handphone,' . $pegawai->id,
            'password' => 'sometimes|required|string|min:8',
        ]);

        // Update pegawai dengan data yang divalidasi
        $pegawai->update([
            'nama_lengkap' => $validated['nama_lengkap'] ?? $pegawai->nama_lengkap,
            'nip' => $validated['nip'] ?? $pegawai->nip,
            'jabatan' => $validated['jabatan'] ?? $pegawai->jabatan,
            'ruangan' => $validated['ruangan'] ?? $pegawai->ruangan,
            'alamat' => $validated['alamat'] ?? $pegawai->alamat,
            'awal_masuk_kerja' => $validated['awal_masuk_kerja'] ?? $pegawai->awal_masuk_kerja,
            'email' => $validated['email'] ?? $pegawai->email,
            'no_handphone' => $validated['no_handphone'] ?? $pegawai->no_handphone,
            'password' => isset($validated['password']) ? Hash::make($validated['password']) : $pegawai->password,
        ]);

        return response()->json($pegawai, 200);
    }

    // Metode untuk menghapus data pegawai berdasarkan ID
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return response()->json(['message' => 'Pegawai deleted successfully'], 200);
    }
}
