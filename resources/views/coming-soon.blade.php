@extends('layouts.app')

@section('title', $modul . ' — SITA Team 11')
@section('page-title', $modul)
@section('page-subtitle', 'Penanggung Jawab: ' . $pic)

@section('content')
<div class="card card-formal p-5 text-center">
    <div class="rounded-circle d-inline-flex p-4 mx-auto mb-3" style="background-color: #EDE9FE; color: #4C1D95;">
        <i class="bi bi-code-slash fs-1"></i>
    </div>
    <h5 class="fw-bold">{{ $modul }}</h5>
    <p class="text-muted small mx-auto" style="max-width: 480px;">
        Kerangka menu telah siap. Halaman CRUD dan endpoint RESTful API untuk bagian ini akan diintegrasikan oleh <strong>{{ $pic }}</strong>.
    </p>
    <div>
        <a href="{{ route('dashboard') }}" class="btn btn-purple btn-sm px-4">Kembali ke Dashboard</a>
    </div>
</div>
@endsection