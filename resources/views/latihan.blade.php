<!-- resources/views/latihan.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Pegawai</title>
</head>
<body>
    <h1>Profil Pegawai</h1>

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
    <p><strong>Semester:</strong> {{ $pegawai['semester'] }}</p>
    <p><strong>Status:</strong> {{ $pegawai['status'] }}</p>
</body>
</html>
