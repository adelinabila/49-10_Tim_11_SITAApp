<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MahasiswaController extends Controller
{
    private array $angkatanList = [2020, 2021, 2022, 2023, 2024, 2025, 2026];
    private array $statusList = ['Aktif', 'Tidak Aktif'];

    public function index()
    {
        $mahasiswa = Mahasiswa::orderByDesc('id')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.form', [
            'mahasiswa'    => new Mahasiswa(['angkatan' => 2022, 'sks' => 0, 'status' => 'Aktif']),
            'angkatanList' => $this->angkatanList,
            'statusList'   => $this->statusList,
        ]);
    }

    public function store(Request $request)
    {
        Mahasiswa::create($this->validated($request));
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.form', [
            'mahasiswa'    => $mahasiswa,
            'angkatanList' => $this->angkatanList,
            'statusList'   => $this->statusList,
        ]);
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa->update($this->validated($request, $mahasiswa->id));
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diubah.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus.');
    }

    private function validated(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'nama'     => ['required', 'string', 'max:255', "regex:/^[\\pL\\s.'-]+$/u"],
            'nim'      => ['required', 'digits_between:7,16', Rule::unique('mahasiswa', 'nim')->ignore($ignoreId)],
            'angkatan' => ['required', Rule::in($this->angkatanList)],
            'sks'      => ['required', 'integer', 'min:0', 'max:250'],
            'status'   => ['required', Rule::in($this->statusList)],
        ], [
            'nama.required'   => 'Nama wajib diisi',
            'nama.regex'      => 'Nama hanya boleh berisi huruf, tidak boleh ada angka',
            'nim.required'    => 'NIM wajib diisi',
            'nim.digits_between' => 'NIM harus berupa angka sepanjang 7 sampai 16 digit',
            'nim.unique'      => 'NIM sudah terdaftar',
            'sks.required'    => 'SKS wajib diisi',
            'sks.integer'     => 'SKS harus berupa angka',
            'sks.min'         => 'SKS tidak boleh kurang dari 0',
            'sks.max'         => 'SKS tidak boleh lebih dari 250',
            'status.required' => 'Pilih status keaktifan',
        ]);
    }
}
