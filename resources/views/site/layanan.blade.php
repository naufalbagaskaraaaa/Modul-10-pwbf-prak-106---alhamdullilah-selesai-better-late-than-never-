<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-widht, initial-scale=1.0">
        <title>
            RSHP - Layanan Umum
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
            Layanan Umum
        </h1>
        <p>
            RSHP menyediakan berbagai
            <strong>layanan kesehatan hewan</strong>yang
            <em>komprehensif</em>
        </p>
        <ol>
            <li>Konsultasi Umum</li>
            <li>Bedah / Operasi</li>
            <li>Laboratorium</li>
        </ol>
    </div>
    </body>
</html>