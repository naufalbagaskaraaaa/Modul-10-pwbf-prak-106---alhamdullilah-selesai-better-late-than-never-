<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-widht, initial-scale=1.0">
        <title>
            RSHP - Rumah Sakit Hewan Pendidikan
        </title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>

        <nav>
        <div class="logo">
            Rumah Sakit Hewan Pendidikan
        </div>
        <ul>
            <li><a href="{{ route('site.home') }}">Home</a></li>
            <li><a href="{{ route('site.layanan') }}">Layanan</a></li>
            <li><a href="{{ route('site.kontak') }}">Kontak</a></li>
            <li><a href="{{ route('site.strukturOrganisasi') }}">Struktur Organisasi</a></li>
            <li><a href="{{ route('site.login') }}">Login</a></li>
        </ul>
        </nav>

        <div class="container">
        <h1>
            Selamat Datang di Rumah Sakit Hewan Pendidikan
        </h1>
        <p>
            Ini adalah halaman utama website kami. Silakan gunakan menu navigasi di atas untuk menjelajahi informasi mengenai struktur organisasi, layanan yang kami sediakan, serta visi dan misi kami.
        </p>
    </div>
    </body>
</html>