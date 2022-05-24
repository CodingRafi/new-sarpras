<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProfilKcd;
use App\Models\Profil;
use App\Models\Kcd;

class ProfilKcdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profilWilayah1 = Profil::where('kabupaten', 'Kab. Bogor')->get();
        foreach($profilWilayah1 as $profil){
            ProfilKcd::create([
                'profil_id' => $profil->id,
                'kcd_id' => 1
            ]);
        }

        $profilWilayah2 = Profil::where('kabupaten', 'kota bogor')->orWhere('kabupaten', 'kota depok')->get();
        foreach($profilWilayah2 as $profil){
            ProfilKcd::create([
                'profil_id' => $profil->id,
                'kcd_id' => 2
            ]);
        }

        $profilWilayah3 = Profil::where('kabupaten', 'kab. bekasi')->orWhere('kabupaten', 'kota bekasi')->get();
        foreach($profilWilayah3 as $profil){
            ProfilKcd::create([
                'profil_id' => $profil->id,
                'kcd_id' => 3
            ]);
        }

        $profilWilayah4 = Profil::where('kabupaten', 'KAB. KARAWANG')->orWhere('kabupaten', 'KAB, SUBANG')->orWhere('kabupaten', 'KAB. PURWAKARTA')->get();
        foreach($profilWilayah4 as $profil){
            ProfilKcd::create([
                'profil_id' => $profil->id,
                'kcd_id' => 4
            ]);
        }

        $profilWilayah5 = Profil::where('kabupaten', 'KOTA SUKABUMI')->orWhere('kabupaten', 'KAB. SUKABUMI')->get();
        foreach($profilWilayah5 as $profil){
            ProfilKcd::create([
                'profil_id' => $profil->id,
                'kcd_id' => 5
            ]);
        }

        $profilWilayah6 = Profil::where('kabupaten', 'KAB. CIANJUR')->orWhere('kabupaten', 'KAB. BANDUNG BARAT')->get();
        foreach($profilWilayah6 as $profil){
            ProfilKcd::create([
                'profil_id' => $profil->id,
                'kcd_id' => 6
            ]);
        }

        $profilWilayah7 = Profil::where('kabupaten', 'KOTA BANDUNG')->orWhere('kabupaten', 'KOTA CIMAHI')->get();
        foreach($profilWilayah7 as $profil){
            ProfilKcd::create([
                'profil_id' => $profil->id,
                'kcd_id' => 7
            ]);
        }

        $profilWilayah8 = Profil::where('kabupaten', 'KAB. BANDUNG')->orWhere('kabupaten', 'KAB. SUMEDANG')->get();
        foreach($profilWilayah8 as $profil){
            ProfilKcd::create([
                'profil_id' => $profil->id,
                'kcd_id' => 8
            ]);
        }

        $profilWilayah9 = Profil::where('kabupaten', 'KAB. INDRAMAYU')->orWhere('kabupaten', 'KAB. MAJALENGKA')->get();
        foreach($profilWilayah9 as $profil){
            ProfilKcd::create([
                'profil_id' => $profil->id,
                'kcd_id' => 9
            ]);
        }

        $profilWilayah10 = Profil::where('kabupaten', 'KOTA CIREBON')->orWhere('kabupaten', 'KAB, CIREBON')->orWhere('kabupaten', 'KAB. KUNINGAN')->get();
        foreach($profilWilayah10 as $profil){
            ProfilKcd::create([
                'profil_id' => $profil->id,
                'kcd_id' => 10
            ]);
        }

        $profilWilayah11 = Profil::where('kabupaten', 'KAB. GARUT')->get();
        foreach($profilWilayah11 as $profil){
            ProfilKcd::create([
                'profil_id' => $profil->id,
                'kcd_id' => 11
            ]);
        }

        $profilWilayah12 = Profil::where('kabupaten', 'KOTA TASIKMALAYA')->orWhere('kabupaten', 'KAB. TASIKMALAYA')->get();
        foreach($profilWilayah12 as $profil){
            ProfilKcd::create([
                'profil_id' => $profil->id,
                'kcd_id' => 12
            ]);
        }

        $profilWilayah13 = Profil::where('kabupaten', 'KOTA BANJAR')->orWhere('kabupaten', 'KAB. CIAMIS')->orWhere('kabupaten', 'KAB. PANGANDARAN');
        foreach($profilWilayah13 as $profil){
            ProfilKcd::create([
                'profil_id' => $profil->id,
                'kcd_id' => 13
            ]);
        }


    }
}
