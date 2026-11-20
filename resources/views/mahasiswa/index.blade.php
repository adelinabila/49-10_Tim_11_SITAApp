@extends('layouts.app')

@section('title', 'Modul Data Mahasiswa')
@section('heading', 'Modul Data Mahasiswa')
@section('subtitle', 'Daftar mahasiswa beserta kelayakan mengikuti sidang')

@section('content')
    <div class="toolbar">
        <a class="btn" href="{{ route('mahasiswa.create') }}">+ Tambah Mahasiswa</a>
    </div>

    <div class="table-wrap">
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Angkatan</th>
                <th>SKS Lulus</th>
                <th>Status</th>
                <th>Status Sidang</th>
                <th>Aksi</th>
            </tr>

            @forelse ($mahasiswa as $m)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->nim }}</td>
                    <td>{{ $m->angkatan }}</td>
                    <td>{{ $m->sks }}</td>
                    <td>{{ $m->status }}</td>
                    <td>
                        @php($ok = $m->sks >= \App\Models\Mahasiswa::MIN_SKS_SIDANG)
                        <span class="{{ $ok ? 'sidang-ok' : 'sidang-no' }}" title="{{ $m->status_sidang }}">
                            {{ $ok ? 'Dapat' : 'Tidak bisa' }}<br>mengikuti sidang
                        </span>
                    </td>
                    <td class="actions">
                        <a class="icon-btn edit" href="{{ route('mahasiswa.edit', $m) }}">
                            <!-- pencil icon -->
                            <svg viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a1 1 0 0 0 0-1.41l-2.34-2.34a1 1 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                            Edit
                        </a>
                        <form method="post" action="{{ route('mahasiswa.destroy', $m) }}"
                              style="display:inline" onsubmit="return confirm('Hapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="icon-btn icon-only delete"
                                    title="Hapus" aria-label="Hapus">
                                <!-- trash icon -->
                                <svg viewBox="0 0 24 24"><path d="M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8" class="empty">Belum ada data.</td></tr>
            @endforelse
        </table>
    </div>
@endsection
