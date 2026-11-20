@extends('layouts.app')

@section('title', 'Topik & Bidang Minat')
@section('page-title', 'Topik & Bidang Minat')
@section('page-subtitle', 'Kelola daftar topik dan bidang minat penelitian')

@section('content')

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <p class="text-muted mb-2">Total Topik Terdaftar</p>
                <h2 class="fw-bold text-primary">{{ $topiks->count() }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="fw-bold mb-1">Data Topik</h5>
                <p class="text-muted mb-0">Kelola daftar topik dan bidang minat.</p>
            </div>

            <a href="{{ route('topik.create') }}" class="btn btn-purple">
                + Tambah Topik
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($topiks as $topik)
                        <tr>
                            <td>{{ $topik->id }}</td>
                            <td>{{ $topik->nama }}</td>
                            <td>{{ $topik->jenis }}</td>
                            <td>{{ $topik->deskripsi }}</td>
                            <td>
                                <a href="{{ route('topik.edit', $topik->id) }}"
                                   class="btn btn-sm btn-primary">
                                    Edit
                                </a>

                                <form action="{{ route('topik.destroy', $topik->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus topik ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Belum ada data topik.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection