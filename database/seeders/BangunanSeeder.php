<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profil;
use App\Models\Bangunan;

class BangunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = Profil::all();
        $jenis = ['ruang_kelas', 'lab_komputer', 'perpustakaan', 'toilet', 'ruang_pimpinan'];
        foreach ($jenis as $key => $jen) {
            if($jen == 'perpustakaan'){
                foreach($datas as $data){
                    Bangunan::create([
                        'jenis' => $jen,
                        'profil_id' => $data->id,
                        'kondisi_ideal' => 30,
                        'ketersediaan' => 0,
                        'kekurangan' => 0
                    ]);
                }
            }else{
                foreach($datas as $data){
                    Bangunan::create([
                        'jenis' => $jen,
                        'profil_id' => $data->id,
                        'kondisi_ideal' => 0,
                        'ketersediaan' => 0,
                        'kekurangan' => 0
                    ]);
                }
            }
        }
    }
}
