<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — SITA Team 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F3F0FF;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .auth-card {
            max-width: 900px;
            width: 100%;
            border: none;
            border-radius: 1.25rem;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(76, 29, 149, 0.12);
        }
        .auth-banner {
            background: linear-gradient(135deg, #4C1D95 0%, #3B0764 100%);
            color: #FFFFFF;
            padding: 3rem;
        }
        .btn-purple {
            background-color: #4C1D95;
            color: #FFFFFF;
            font-weight: 600;
            padding: 0.7rem;
            border-radius: 0.6rem;
        }
        .btn-purple:hover {
            background-color: #5B21B6;
            color: #FFFFFF;
        }
        .form-control:focus {
            border-color: #7C3AED;
            box-shadow: 0 0 0 0.2rem rgba(124, 58, 237, 0.15);
        }
    </style>
</head>
<body class="p-3">

<div class="card auth-card">
    <div class="row g-0">
        <div class="col-md-5 auth-banner d-flex flex-column justify-content-between">
            <div>
                <div class="bg-white rounded-3 d-inline-flex p-2 mb-4">
                    <i class="bi bi-mortarboard-fill fs-3" style="color: #4C1D95;"></i>
                </div>
                <h3 class="fw-bold mb-3">SITA Team 11</h3>
                <p class="small opacity-75 lh-lg">
                    Sistem Informasi Tugas Akhir & Skripsi terintegrasi untuk pengelolaan topik riset, dosen pembimbing, data mahasiswa, dan ruang sidang.
                </p>
            </div>
            <div class="small opacity-75">
                Studi Kasus 11 &bull; Pengembangan Aplikasi Web
            </div>
        </div>

        <div class="col-md-7 bg-white p-4 p-md-5">
            <h4 class="fw-bold text-dark mb-1">Selamat Datang Kembali</h4>
            <p class="text-muted small mb-4">Silakan masuk menggunakan akun Anda untuk mengakses dashboard.</p>

            @if($errors->any())
                <div class="alert alert-danger py-2 small">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Alamat Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="nama@kampus.ac.id" required autofocus>
                </div>
                <div class="mb-4">
                    <label class="form-label small fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>
                <button type="submit" class="btn btn-purple w-100 mb-3">Masuk ke Sistem</button>
            </form>

            <div class="text-center small text-muted">
                Belum memiliki akun? <a href="{{ route('register') }}" class="fw-semibold text-decoration-none" style="color: #4C1D95;">Daftar Sekarang</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>