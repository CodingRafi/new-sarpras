<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProgramKompetensi;

class ProgramKompetensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProgramKompetensi::create([
            'nama' => 'Teknologi Konstruksi dan Bangunan'
        ]);

        ProgramKompetensi::create([
            'nama' => 'Teknologi Konstruksi dan Bangunan'
        ]);
    }
}
