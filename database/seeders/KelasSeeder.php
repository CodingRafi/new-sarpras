<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profil;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = Profil::all();
        foreach ($datas as $key => $data) {
            Kelas::create([
                'profil_id' => $data->id,
                'kondisi_ideal' => 0,
                'ketersediaan' => 0,
                'kekurangan' => 0
            ]);
        }
    }
}
