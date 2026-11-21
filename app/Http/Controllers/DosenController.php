<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::latest()->get();
        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_dosen' => 'required|string|max:255',
            'nidn' => 'required|string|max:20|unique:dosens,nidn',
            'jabatan_fungsional' => 'required|string|max:100',
            'kepakaran_riset' => 'required|string|max:255',
        ]);

        Dosen::create($validated);

        return redirect()->route('dosen.index')->with('success', 'Data dosen pembimbing berhasil ditambahkan!');
    }

    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $validated = $request->validate([
            'nama_dosen' => 'required|string|max:255',
            'nidn' => 'required|string|max:20|unique:dosens,nidn,' . $dosen->id,
            'jabatan_fungsional' => 'required|string|max:100',
            'kepakaran_riset' => 'required|string|max:255',
        ]);

        $dosen->update($validated);

        return redirect()->route('dosen.index')->with('success', 'Data dosen pembimbing berhasil diperbarui!');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Data dosen pembimbing berhasil dihapus!');
    }
}