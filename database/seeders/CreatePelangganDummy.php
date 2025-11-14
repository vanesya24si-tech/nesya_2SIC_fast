<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CreatePelangganDummy extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $dataPelanggan = [];
        $now = Carbon::now();
        $jumlahData = 100;

        foreach (range(1, $jumlahData) as $index) {

            // 1. Tentukan Gender secara acak
            $gender = $faker->randomElement(['Male', 'Female']);

            // 2. Tentukan Nama Depan berdasarkan Gender
            if ($gender === 'Male') {
                // Ambil nama laki-laki Indonesia yang lebih spesifik
                $firstName = $faker->firstNameMale;
            } else {
                // Ambil nama perempuan Indonesia yang lebih spesifik
                $firstName = $faker->firstNameFemale;
            }

            $dataPelanggan[] = [
                'first_name' => $firstName,
                'last_name'  => $faker->lastName, // Nama belakang masih mungkin umum
                'birthday'   => $faker->date('Y-m-d', '2005-12-31'),
                'gender'     => $gender,
                'email'      => $faker->unique()->safeEmail,
                'phone'      => $faker->phoneNumber,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('pelanggan')->insert($dataPelanggan);

        $this->command->info("✅ Berhasil membuat {$jumlahData} data pelanggan dummy dengan nama Indonesia.");
    }
}
