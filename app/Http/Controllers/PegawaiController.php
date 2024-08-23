<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        return Pegawai::all();
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
        ]);

        $pegawai = Pegawai::create($validated);
        return response()->json($pegawai, 201);
    }

    public function show($id)
    {
        return Pegawai::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $validated = $request->validate([
            'nama_lengkap' => 'sometimes|required|string',
            'nip' => 'sometimes|required|string|unique:pegawai,nip,' . $pegawai->id_pegawai . ',id_pegawai',
            'jabatan' => 'sometimes|required|string',
            'ruangan' => 'sometimes|required|string',
            'alamat' => 'sometimes|required|string',
            'awal_masuk_kerja' => 'sometimes|required|date',
            'email' => 'sometimes|required|email|unique:pegawai,email,' . $pegawai->id_pegawai . ',id_pegawai',
            'no_handphone' => 'sometimes|required|string|unique:pegawai,no_handphone,' . $pegawai->id_pegawai . ',id_pegawai',
        ]);

        $pegawai->update($validated);
        return response()->json($pegawai, 200);
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return response()->json(null, 204);
    }
}
