@extends('layouts.app')

@section('title', 'Tambah Topik')
@section('page-title', 'Tambah Topik')
@section('page-subtitle', 'Tambahkan topik dan bidang minat penelitian baru')

@section('content')

<div class="card border-0 shadow-sm" style="max-width: 750px;">
    <div class="card-body p-4">

        <h5 class="fw-bold mb-4">Form Tambah Topik</h5>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('topik.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Topik</label>
                <input type="text"
                       name="nama"
                       class="form-control"
                       value="{{ old('nama') }}"
                       placeholder="Masukkan nama topik"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis</label>
                <input type="text"
                       name="jenis"
                       class="form-control"
                       value="{{ old('jenis') }}"
                       placeholder="Masukkan jenis bidang minat"
                       required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi"
                          class="form-control"
                          rows="5"
                          placeholder="Masukkan deskripsi topik">{{ old('deskripsi') }}</textarea>
            </div>

            <button type="submit" class="btn btn-purple">
                Simpan Topik
            </button>

            <a href="{{ route('topik.index') }}"
               class="btn btn-light border ms-2">
                Kembali
            </a>
        </form>

    </div>
</div>

@endsection