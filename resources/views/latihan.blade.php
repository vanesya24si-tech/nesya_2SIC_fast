<!-- resources/views/latihan.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Profil Pegawai</title>
    <style>
        /* Reset dasar */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f4f8;
            color: #333;
            padding: 40px;
            max-width: 700px;
            margin: auto;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-weight: 700;
            letter-spacing: 1.2px;
        }
        .card {
            background: #fff;
            border-radius: 10px;
            padding: 30px 40px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        p {
            font-size: 1.1rem;
            line-height: 1.5;
            margin: 12px 0;
        }
        strong {
            color: #34495e;
            width: 140px;
            display: inline-block;
        }
        ul {
            margin-top: 5px;
            padding-left: 20px;
            list-style-type: square;
        }
        ul li {
            margin-bottom: 6px;
            font-size: 1.05rem;
        }
        .footer {
            margin-top: 40px;
            font-style: italic;
            color: #7f8c8d;
            text-align: center;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <h1>Profil Pegawai</h1>

    <div class="card">
        <p><strong>Nama:</strong> {{ $pegawai['nama'] }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ $pegawai['tanggal_lahir'] }}</p>
        <p><strong>Umur:</strong> {{ $pegawai['umur'] }} tahun</p>

        <p><strong>Hobi:</strong></p>
        <ul>
            @foreach ($pegawai['hobi'] as $hobi)
                <li>{{ $hobi }}</li>
            @endforeach
        </ul>

        <p><strong>Tanggal Masuk:</strong> {{ $pegawai['tanggal_masuk'] }}</p>
        <p><strong>Sejak Berapa Hari:</strong> {{ $pegawai['sejak_berapa_hari'] }} hari</p>
        @if(isset($pegawai['pesan']))
            <p><strong>Pesan:</strong> {{ $pegawai['pesan'] }}</p>
        @endif
        <p><strong>Status:</strong> {{ $pegawai['status'] }}</p>
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} Company Profile
    </div>
</body>
</html>
