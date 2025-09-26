<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; // Tambahkan ini untuk mempermudah perhitungan tanggal

class PegawaiController extends Controller
{
    // ... fungsi lain yang mungkin sudah ada

    public function latihan()
    {
        $tanggalLahir = Carbon::parse('2006-08-05');
        $umur = $tanggalLahir->age; // Menghitung umur secara otomatis

        $tanggalMasuk = Carbon::parse('2022-01-10');
        $sejakBerapaHari = $tanggalMasuk->diffInDays(Carbon::now()); // Menghitung selisih hari secara otomatis

        // Data pegawai yang sudah diperbarui
        $data_pegawai = [
            'nama' => 'Vanesya Wilyan',
            'tanggal_lahir' => $tanggalLahir->format('d F Y'), // Format tanggal lahir agar lebih rapi
            'umur' => $umur,
            'hobi' => [
                'Memasak',
                'Membaca',
                'Bermain musik',
                'Traveling',
                'Menulis'
            ],
            'tanggal_masuk' => $tanggalMasuk->format('d F Y'),
            'sejak_berapa_hari' => $sejakBerapaHari,
            'semester' => 3,
            'status' => 'Mahasiswa',
        ];

        // Meneruskan data ke view
        return view('halaman-latihan', ['pegawai' => $data_pegawai]);
    }
}
