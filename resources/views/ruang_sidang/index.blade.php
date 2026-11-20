@extends('layouts.app')

@section('title', 'Modul D: Ruang & Fasilitas Sidang')

@section('content')
    <div class="container-fluid py-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1">Modul D: Ruang &amp; Fasilitas Sidang</h4>
                <p class="text-muted mb-0">Kelola data ruang sidang, gedung, kapasitas, dan fasilitas</p>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahRuang">
                + Tambah Ruang
            </button>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th width="60">NO</th>
                                <th>KODE RUANGAN</th>
                                <th>NAMA GEDUNG</th>
                                <th>KAPASITAS</th>
                                <th>FASILITAS</th>
                                <th>STATUS</th>
                                <th width="160">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ruangs ?? [] as $index => $ruang)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $ruang->kode_ruangan }}</td>
                                    <td>{{ $ruang->nama_gedung }}</td>
                                    <td>{{ $ruang->kapasitas }}</td>
                                    <td>{{ $ruang->fasilitas }}</td>
                                    <td>{{ $ruang->status_ruangan }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#modalEditRuang{{ $ruang->id }}">
                                            Edit
                                        </button>
                                        <form action="{{ route('ruang-sidang.destroy', $ruang->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Hapus data ruang ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">
                                        Belum ada data ruang sidang. Klik <strong>+ Tambah Ruang</strong> untuk mulai mengisi.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Ruang -->
    <div class="modal fade" id="modalTambahRuang" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('ruang-sidang.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Ruang Sidang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Kode Ruangan</label>
                            <input type="text" name="kode_ruangan" class="form-control" value="{{ old('kode_ruangan') }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Gedung</label>
                            <input type="text" name="nama_gedung" class="form-control" value="{{ old('nama_gedung') }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kapasitas</label>
                            <input type="number" name="kapasitas" class="form-control" value="{{ old('kapasitas') }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fasilitas</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="fasilitas[]" value="Proyektor"
                                    id="fasProyektor">
                                <label class="form-check-label" for="fasProyektor">Proyektor</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="fasilitas[]" value="AC" id="fasAC">
                                <label class="form-check-label" for="fasAC">AC</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="fasilitas[]" value="PC" id="fasPC">
                                <label class="form-check-label" for="fasPC">PC</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status Ruangan</label>
                            <select name="status_ruangan" class="form-select" required>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Ruang -->
    @foreach($ruangs ?? [] as $ruang)
        @php
            $fasilitasTerpilih = explode(', ', (string) $ruang->fasilitas);
        @endphp
        <div class="modal fade" id="modalEditRuang{{ $ruang->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('ruang-sidang.update', $ruang->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Ruang Sidang</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Kode Ruangan</label>
                                <input type="text" name="kode_ruangan" class="form-control" value="{{ $ruang->kode_ruangan }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Gedung</label>
                                <input type="text" name="nama_gedung" class="form-control" value="{{ $ruang->nama_gedung }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kapasitas</label>
                                <input type="number" name="kapasitas" class="form-control" value="{{ $ruang->kapasitas }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fasilitas</label>
                                @foreach(['Proyektor', 'AC', 'PC'] as $itemFas)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="fasilitas[]" value="{{ $itemFas }}"
                                            id="edit{{ $ruang->id }}{{ $itemFas }}" {{ in_array($itemFas, $fasilitasTerpilih) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="edit{{ $ruang->id }}{{ $itemFas }}">{{ $itemFas }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status Ruangan</label>
                                <select name="status_ruangan" class="form-select" required>
                                    <option value="Tersedia" {{ $ruang->status_ruangan == 'Tersedia' ? 'selected' : '' }}>Tersedia
                                    </option>
                                    <option value="Tidak Tersedia" {{ $ruang->status_ruangan == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection