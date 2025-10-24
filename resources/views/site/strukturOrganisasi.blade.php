<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-widht, initial-scale=1.0">
        <title>
            RSHP - Struktur Organisasi
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
            Struktur Organisasi
        </h1>
        <table border="1" style="border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="padding: 12px;">
                        Jabatan
                    </th>
                    <th style="padding: 12px;">
                        Nama
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 12px;">
                        <strong>Direktur</strong>
                    </td>
                    <td style="padding: 12px;">
                        drh. Adi, M.Vet
                    </td>
                </tr>
                <tr>
                    <td style="padding: 12px;">
                        <strong>Wakil Direktur</strong>
                    </td>
                    <td style="padding: 12px;">
                        drh. Budi, M.Sc
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </body>
</html>