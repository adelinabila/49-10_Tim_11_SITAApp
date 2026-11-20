@extends('layouts.app')

@section('title', 'Edit Topik')
@section('page-title', 'Edit Topik')
@section('page-subtitle', 'Perbarui informasi topik dan bidang minat penelitian')

@section('content')

<div class="card border-0 shadow-sm" style="max-width: 750px;">
    <div class="card-body p-4">

        <h5 class="fw-bold mb-4">Form Edit Topik</h5>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('topik.update', $topik->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Topik</label>
                <input type="text"
                       name="nama"
                       class="form-control"
                       value="{{ old('nama', $topik->nama) }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis</label>
                <input type="text"
                       name="jenis"
                       class="form-control"
                       value="{{ old('jenis', $topik->jenis) }}"
                       required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi"
                          class="form-control"
                          rows="5">{{ old('deskripsi', $topik->deskripsi) }}</textarea>
            </div>

            <button type="submit" class="btn btn-purple">
                Simpan Perubahan
            </button>

            <a href="{{ route('topik.index') }}"
               class="btn btn-light border ms-2">
                Kembali
            </a>
        </form>

    </div>
</div>

@endsection