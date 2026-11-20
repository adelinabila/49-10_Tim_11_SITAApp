<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Modul Data Mahasiswa')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="hero">
        <div class="container">
            <div class="logo">
                <!-- graduation cap icon -->
                <svg viewBox="0 0 24 24"><path d="M12 3 1 9l11 6 9-4.9V17h2V9L12 3zm-6 9.2v4l6 3.3 6-3.3v-4l-6 3.3-6-3.3z"/></svg>
            </div>
            <h1>@yield('heading')</h1>
            <p>@yield('subtitle', 'Kelola data mahasiswa dengan mudah')</p>
        </div>
    </header>

    <main class="container">
        <div class="card">
            @if (session('success'))
                <p class="success">{{ session('success') }}</p>
            @endif

            @yield('content')
        </div>
    </main>
</body>
</html>
