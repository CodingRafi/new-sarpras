<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Spektrum;

class SpektrumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Spektrum::create([
           'nama' => 'Kurikulum Merdeka' ,
           'aturan' => 'NOMOR 024/H/KR/2022',
           'tanggal' => '2022-04-19',
           'lampiran' => 'merdeka.pdf'
        ]);

        Spektrum::create([
            'nama' => 'Kurikulum 2018' ,
            'aturan' => 'NOMOR 06/D.D5/KK/2018',
            'tanggal' => '2018-06-07',
            'lampiran' => '2018.pdf'
         ]);
    }
}
