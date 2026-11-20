@extends('layouts.app')

@section('title', 'Data Dosen Pembimbing — SITA Team 11')
@section('page-title', 'Modul B: Dosen Pembimbing')
@section('page-subtitle', 'Direktori profil dosen pembimbing, jabatan fungsional, dan kepakaran riset')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h6 class="fw-bold mb-0">Daftar Dosen Pembimbing</h6>
        <small class="text-muted">Total {{ $dosens->count() }} dosen terdaftar dalam sistem</small>
    </div>
    <a href="{{ route('dosen.create') }}" class="btn btn-purple px-4">
        <i class="bi bi-plus-lg me-1"></i> Tambah Dosen
    </a>
</div>

<div class="card card-formal overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover table-purple align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4" style="width: 60px;">No</th>
                    <th>Nama Dosen</th>
                    <th>NIDN</th>
                    <th>Jabatan Fungsional</th>
                    <th>Kepakaran Riset</th>
                    <th class="text-center pe-4" style="width: 170px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dosens as $index => $dosen)
                <tr>
                    <td class="ps-4 text-muted">{{ $index + 1 }}</td>
                    <td class="fw-semibold text-dark">{{ $dosen->nama_dosen }}</td>
                    <td><span class="font-monospace small">{{ $dosen->nidn }}</span></td>
                    <td>
                        <span class="badge rounded-pill px-3 py-2" style="background-color: #EDE9FE; color: #4C1D95;">
                            {{ $dosen->jabatan_fungsional }}
                        </span>
                    </td>
                    <td>{{ $dosen->kepakaran_riset }}</td>
                    <td class="text-center pe-4">
                        <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-sm btn-outline-primary me-1" title="Edit">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data dosen ini?')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-5">
                        <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                        Belum ada data dosen pembimbing. Klik <strong>Tambah Dosen</strong> untuk mulai mengisi.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection