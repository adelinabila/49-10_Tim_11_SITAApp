@extends('layouts.app')

@section('title', 'Dashboard — SITA Team 11')
@section('page-title', 'Dashboard Utama')
@section('page-subtitle', 'Ringkasan Modul Sistem Informasi Tugas Akhir & Skripsi')

@section('content')
<div class="card card-formal p-4 mb-4 border-start border-4" style="border-left-color: #4C1D95 !important;">
    <h5 class="fw-bold mb-1">Selamat Datang, {{ Auth::user()->name }}!</h5>
    <p class="text-muted mb-0 small">Anda telah masuk ke Master Project <strong>SITA Team 11</strong>. Silakan pilih salah satu modul otonom di bawah ini atau melalui menu di sidebar kiri.</p>
</div>

<div class="row g-4">
    <div class="col-md-6 col-lg-3">
        <div class="card card-formal p-4 h-100">
            <div class="rounded-3 d-inline-flex p-3 mb-3" style="background-color: #EDE9FE; color: #4C1D95; width: fit-content;">
                <i class="bi bi-journal-bookmark-fill fs-4"></i>
            </div>
            <h6 class="fw-bold">Modul A: Topik & Minat</h6>
            <p class="text-muted small mb-3">Taksonomi topik riset, rumpun ilmu, dan kata kunci penelitian.</p>
            <a href="{{ route('topik.index') }}" class="btn btn-sm btn-purple mt-auto">Buka Modul</a>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card card-formal p-4 h-100">
            <div class="rounded-3 d-inline-flex p-3 mb-3" style="background-color: #EDE9FE; color: #4C1D95; width: fit-content;">
                <i class="bi bi-person-badge-fill fs-4"></i>
            </div>
            <h6 class="fw-bold">Modul B: Dosen Pembimbing</h6>
            <p class="text-muted small mb-3">Profil dosen pembimbing, NIDN, jabatan fungsional, dan kepakaran.</p>
            <a href="{{ route('dosen.index') }}" class="btn btn-sm btn-purple mt-auto">Buka Modul</a>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card card-formal p-4 h-100">
            <div class="rounded-3 d-inline-flex p-3 mb-3" style="background-color: #EDE9FE; color: #4C1D95; width: fit-content;">
                <i class="bi bi-people-fill fs-4"></i>
            </div>
            <h6 class="fw-bold">Modul C: Data Mahasiswa</h6>
            <p class="text-muted small mb-3">Biodata mahasiswa peserta TA, NIM, angkatan, SKS, dan status.</p>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-sm btn-purple mt-auto">Buka Modul</a>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card card-formal p-4 h-100">
            <div class="rounded-3 d-inline-flex p-3 mb-3" style="background-color: #EDE9FE; color: #4C1D95; width: fit-content;">
                <i class="bi bi-building-fill fs-4"></i>
            </div>
            <h6 class="fw-bold">Modul D: Ruang Sidang</h6>
            <p class="text-muted small mb-3">Master ruang ujian/sidang, nomor gedung, dan fasilitas PC/proyektor.</p>
            <a href="{{ route('ruang.index') }}" class="btn btn-sm btn-purple mt-auto">Buka Modul</a>
        </div>
    </div>
</div>
@endsection