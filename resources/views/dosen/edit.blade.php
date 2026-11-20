@extends('layouts.app')

@section('title', 'Edit Dosen Pembimbing — SITA Team 11')
@section('page-title', 'Edit Dosen Pembimbing')
@section('page-subtitle', 'Perbarui informasi profil dan kepakaran dosen pembimbing')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card card-formal p-4">
            <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold small">Nama Lengkap & Gelar Dosen</label>
                    <input type="text" name="nama_dosen" class="form-control @error('nama_dosen') is-invalid @enderror" value="{{ old('nama_dosen', $dosen->nama_dosen) }}" required>
                    @error('nama_dosen') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold small">NIDN</label>
                        <input type="text" name="nidn" class="form-control @error('nidn') is-invalid @enderror" value="{{ old('nidn', $dosen->nidn) }}" required>
                        @error('nidn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold small">Jabatan Fungsional</label>
                        <select name="jabatan_fungsional" class="form-select @error('jabatan_fungsional') is-invalid @enderror" required>
                            @foreach(['Asisten Ahli', 'Lektor', 'Lektor Kepala', 'Guru Besar'] as $jabatan)
                                <option value="{{ $jabatan }}" {{ old('jabatan_fungsional', $dosen->jabatan_fungsional) == $jabatan ? 'selected' : '' }}>
                                    {{ $jabatan }}
                                </option>
                            @endforeach
                        </select>
                        @error('jabatan_fungsional') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold small">Kepakaran Riset</label>
                    <input type="text" name="kepakaran_riset" class="form-control @error('kepakaran_riset') is-invalid @enderror" value="{{ old('kepakaran_riset', $dosen->kepakaran_riset) }}" required>
                    @error('kepakaran_riset') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('dosen.index') }}" class="btn btn-light border px-4">Batal</a>
                    <button type="submit" class="btn btn-purple px-4">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection