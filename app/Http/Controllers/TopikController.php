<?php

namespace App\Http\Controllers;

use App\Models\Topik;
use Illuminate\Http\Request;

class TopikController extends Controller
{
    public function index()
    {
        $topiks = Topik::all();

        return view('topik.index', compact('topiks'));
    }

    public function create()
    {
        return view('topik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'nullable',
        ]);

        Topik::create($request->only([
            'nama',
            'jenis',
            'deskripsi'
        ]));

        return redirect()->route('topik.index')
            ->with('success', 'Topik berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $topik = Topik::findOrFail($id);

        return view('topik.edit', compact('topik'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $topik = Topik::findOrFail($id);

        $topik->update($request->only([
            'nama',
            'jenis',
            'deskripsi'
        ]));

        return redirect()->route('topik.index')
            ->with('success', 'Topik berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $topik = Topik::findOrFail($id);
        $topik->delete();

        return redirect()->route('topik.index')
            ->with('success', 'Topik berhasil dihapus!');
    }
}