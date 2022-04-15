<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProfilDepo;
use App\Models\Profil;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profils = ProfilDepo::DataProfilSekolah();
        foreach($profils as $profil){
            Profil::create([
                'npsn' => $profil["npsn"],
                'sekolah_id' => $profil["sekolah_id"],
                'nama' => $profil["nama"],
                'status_sekolah' => $profil["status_sekolah"],
            ]);
        }
    }
}
