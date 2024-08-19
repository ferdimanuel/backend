<?php

namespace App\Http\Controllers;

use App\Models\PengajuanCuti;
use Illuminate\Http\Request;

class PengajuanCutiController extends Controller
{
    public function index()
    {
        return PengajuanCuti::with('pegawai')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pegawai' => 'required|exists:pegawai,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan_cuti' => 'required|string',
            'tipe_cuti' => 'required|string',
        ]);

        $pengajuanCuti = PengajuanCuti::create($validated);
        return response()->json($pengajuanCuti, 201);
    }

    public function show($id)
    {
        return PengajuanCuti::with('pegawai')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $pengajuanCuti = PengajuanCuti::findOrFail($id);
        $pengajuanCuti->update($request->all());
        return response()->json($pengajuanCuti, 200);
    }

    public function destroy($id)
    {
        $pengajuanCuti = PengajuanCuti::findOrFail($id);
        $pengajuanCuti->delete();
        return response()->json(null, 204);
    }
}
