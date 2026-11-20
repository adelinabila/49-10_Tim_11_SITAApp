@extends('layouts.app')

@php($editing = $mahasiswa->exists)

@section('title', $editing ? 'Edit Mahasiswa' : 'Tambah Mahasiswa')
@section('heading', $editing ? 'Edit Data Mahasiswa' : 'Tambah Data Mahasiswa')
@section('subtitle', 'Isi data mahasiswa dengan lengkap dan benar')

@section('content')
    <form method="post"
          action="{{ $editing ? route('mahasiswa.update', $mahasiswa) : route('mahasiswa.store') }}">
        @csrf
        @if ($editing)
            @method('PUT')
        @endif

        <div class="field">
            <label class="field-label" for="mnama">Nama</label>
            <input type="text" id="mnama" name="nama" placeholder="Asep"
                   value="{{ old('nama', $mahasiswa->nama) }}">
            @error('nama') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="field">
            <label class="field-label" for="mnim">NIM</label>
            <input type="text" id="mnim" name="nim" placeholder="102022000000"
                   value="{{ old('nim', $mahasiswa->nim) }}">
            @error('nim') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="field">
            <label class="field-label" for="mangkatan">Angkatan</label>
            <select id="mangkatan" name="angkatan">
                @foreach ($angkatanList as $a)
                    <option value="{{ $a }}" @selected((int) old('angkatan', $mahasiswa->angkatan) === $a)>
                        {{ $a }}
                    </option>
                @endforeach
            </select>
            @error('angkatan') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="field">
            <label class="field-label" for="msks">SKS Lulus</label>
            <input type="text" id="msks" name="sks" placeholder="144"
                   value="{{ old('sks', $mahasiswa->sks) }}">
            @error('sks') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="field">
            <span class="field-label">Status Keaktifan</span>
            <div class="radio-group">
                @foreach ($statusList as $s)
                    <label class="radio-option">
                        <input type="radio" name="status" value="{{ $s }}"
                               @checked(old('status', $mahasiswa->status) === $s)>
                        {{ $s }}
                    </label>
                @endforeach
            </div>
            @error('status') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-actions">
            <button type="submit">{{ $editing ? 'Simpan Perubahan' : 'Simpan' }}</button>
            <a href="{{ route('mahasiswa.index') }}">Batal</a>
        </div>
    </form>
@endsection
