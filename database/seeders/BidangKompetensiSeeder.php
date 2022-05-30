<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidangKompetensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BidangKompetensi:create([
            'nama' => 'Teknologi Konstruksi dan Bangunan'
        ]);

        BidangKompetensi:create([
            'nama' => 'Teknologi Manufaktur dan Rekayasa'
        ]);

        BidangKompetensi:create([
            'nama' => 'Energi dan Pertambangan'
        ]);

        BidangKompetensi:create([
            'nama' => 'Teknologi Informasi'
        ]);

        BidangKompetensi:create([
            'nama' => 'Kesehatan dan Pekerjaan Sosial'
        ]);

        BidangKompetensi:create([
            'nama' => 'Agribisnis dan Agriteknologi'
        ]);

        BidangKompetensi:create([
            'nama' => 'Kemaritiman'
        ]);

        BidangKompetensi:create([
            'nama' => 'Bisnis dan Manajemen'
        ]);

        BidangKompetensi:create([
            'nama' => 'Pariwisata'
        ]);

        BidangKompetensi:create([
            'nama' => 'Seni dan Ekonomi Kreatif'
        ]);
    }
}
