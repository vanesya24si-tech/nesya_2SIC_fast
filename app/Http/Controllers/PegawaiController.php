<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    // ... fungsi lain yang mungkin sudah ada

    public function latihan()
    {
        // Data tanggal lahir dan tanggal masuk
        $tanggalLahir = new \DateTime('2006-08-05');
        $tanggalMasuk = new \DateTime('2022-01-10');
        $hariIni = new \DateTime();

        // Menghitung umur secara manual
        $umur = $hariIni->diff($tanggalLahir)->y;

        // Menghitung selisih hari secara manual
        $sejakBerapaHari = $hariIni->diff($tanggalMasuk)->days;

        // Data pegawai yang sudah diperbarui
        $data_pegawai = [
            'nama' => 'Vanesya Wilyan',
            'tanggal_lahir' => '05 Agustus 2006',
            'umur' => $umur,
            'hobi' => [
                'Memasak',
                'Membaca',
                'Bermain musik',
                'Traveling',
                'Menulis'
            ],
            'tanggal_masuk' => '10 Januari 2022',
            'sejak_berapa_hari' => $sejakBerapaHari,
            'semester' => 3,
            'status' => 'Mahasiswa',
        ];

        // Meneruskan data ke view
        return view('halaman-latihan', ['pegawai' => $data_pegawai]);
    }
}
