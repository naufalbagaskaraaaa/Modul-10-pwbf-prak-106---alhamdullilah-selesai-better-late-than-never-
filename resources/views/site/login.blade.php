<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-widht, initial-scale=1.0">
        <title>
            RSHP - Login
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
            <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
        </nav>
        
        <div class="container" style="text-align: center;">
        <h1>
            Login
        </h1>
    </div>
    </body>
</html>