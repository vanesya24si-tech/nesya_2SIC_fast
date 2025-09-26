<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tugas Pertemuan 3 - Latihan</title>
</head>
<body>
    <h1>Data Pegawai</h1>
    <ul>
        <li><strong>Nama:</strong> {{ $pegawai['nama'] }}</li>
        <li><strong>Tanggal Lahir:</strong> {{ $pegawai['tanggal_lahir'] }}</li>
        <li><strong>Umur:</strong> {{ $pegawai['umur'] }} tahun</li>
        <li><strong>Hobi:</strong></li>
        <ul>
            @foreach ($pegawai['hobi'] as $hobi)
                <li>{{ $hobi }}</li>
            @endforeach
        </ul>
        <li><strong>Tanggal Masuk:</strong> {{ $pegawai['tanggal_masuk'] }}</li>
        <li><strong>Sudah Berapa Hari Bekerja:</strong> {{ $pegawai['sejak_berapa_hari'] }} hari</li>
        <li><strong>Semester saat ini:</strong> {{ $pegawai['semester'] }}</li>
        <li><strong>Status:</strong> {{ $pegawai['status'] }}</li>
    </ul>
</body>
</html>
