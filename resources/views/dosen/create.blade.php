@extends('layouts.app')

@section('title', 'Tambah Dosen Pembimbing — SITA Team 11')
@section('page-title', 'Tambah Dosen Pembimbing')
@section('page-subtitle', 'Formulir penambahan data dosen pembimbing baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card card-formal p-4">
            <form action="{{ route('dosen.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold small">Nama Lengkap & Gelar Dosen</label>
                    <input type="text" name="nama_dosen" class="form-control @error('nama_dosen') is-invalid @enderror" value="{{ old('nama_dosen') }}" placeholder="Contoh: Dr. Budi Santoso, S.Kom., M.T." required>
                    @error('nama_dosen') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold small">NIDN</label>
                        <input type="text" name="nidn" class="form-control @error('nidn') is-invalid @enderror" value="{{ old('nidn') }}" placeholder="Contoh: 0412088501" required>
                        @error('nidn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold small">Jabatan Fungsional</label>
                        <select name="jabatan_fungsional" class="form-select @error('jabatan_fungsional') is-invalid @enderror" required>
                            <option value="" disabled selected>-- Pilih Jabatan --</option>
                            <option value="Asisten Ahli" {{ old('jabatan_fungsional') == 'Asisten Ahli' ? 'selected' : '' }}>Asisten Ahli</option>
                            <option value="Lektor" {{ old('jabatan_fungsional') == 'Lektor' ? 'selected' : '' }}>Lektor</option>
                            <option value="Lektor Kepala" {{ old('jabatan_fungsional') == 'Lektor Kepala' ? 'selected' : '' }}>Lektor Kepala</option>
                            <option value="Guru Besar" {{ old('jabatan_fungsional') == 'Guru Besar' ? 'selected' : '' }}>Guru Besar</option>
                        </select>
                        @error('jabatan_fungsional') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold small">Kepakaran Riset</label>
                    <input type="text" name="kepakaran_riset" class="form-control @error('kepakaran_riset') is-invalid @enderror" value="{{ old('kepakaran_riset') }}" placeholder="Contoh: Rekayasa Perangkat Lunak, UI/UX Design, Data Mining" required>
                    @error('kepakaran_riset') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('dosen.index') }}" class="btn btn-light border px-4">Batal</a>
                    <button type="submit" class="btn btn-purple px-4">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection