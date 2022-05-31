<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProfilDepo;
use App\Models\KotaKabupaten;
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
        $profils = ProfilDepo::all();
        $kotaKabupaten = KotaKabupaten::all();
        foreach($profils as $profil){
            Profil::createProfilSeeder($profil, KotaKabupaten::kota($profil, $kotaKabupaten));
        }
    }
}
