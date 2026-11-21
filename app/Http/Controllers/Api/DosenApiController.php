<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Daftar data dosen pembimbing',
            'data' => Dosen::latest()->get(),
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_dosen' => 'required|string|max:255',
            'nidn' => 'required|string|max:20|unique:dosens,nidn',
            'jabatan_fungsional' => 'required|string|max:100',
            'kepakaran_riset' => 'required|string|max:255',
        ]);

        $dosen = Dosen::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Data dosen berhasil ditambahkan',
            'data' => $dosen,
        ], 201);
    }

    public function show($id)
    {
        $dosen = Dosen::find($id);

        if (!$dosen) {
            return response()->json(['status' => false, 'message' => 'Data dosen tidak ditemukan'], 404);
        }

        return response()->json(['status' => true, 'data' => $dosen], 200);
    }

    public function update(Request $request, $id)
    {
        $dosen = Dosen::find($id);

        if (!$dosen) {
            return response()->json(['status' => false, 'message' => 'Data dosen tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama_dosen' => 'required|string|max:255',
            'nidn' => 'required|string|max:20|unique:dosens,nidn,' . $dosen->id,
            'jabatan_fungsional' => 'required|string|max:100',
            'kepakaran_riset' => 'required|string|max:255',
        ]);

        $dosen->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Data dosen berhasil diperbarui',
            'data' => $dosen,
        ], 200);
    }

    public function destroy($id)
    {
        $dosen = Dosen::find($id);

        if (!$dosen) {
            return response()->json(['status' => false, 'message' => 'Data dosen tidak ditemukan'], 404);
        }

        $dosen->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data dosen berhasil dihapus',
        ], 200);
    }
}