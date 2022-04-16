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
        $profils = ProfilDepo::all();
        foreach($profils as $profil){
            $kopetensi = $profil->kopetensikeahlian;
            Profil::create([
                'profil_depo_id' => $profil['id'],
                'npsn' => $profil["depo_npsn"],
                'sekolah_id' => $profil["depo_sekolah_id"],
                'nama' => $profil["depo_nama"],
                'status_sekolah' => $profil["depo_status_sekolah"],
                'alamat' => $profil['depo_alamat'],
                'provinsi' => $profil['depo_provinsi'],
                'kabupaten' => $profil['depo_kabupaten'],
                'kecamatan' => $profil['depo_kecamatan'],
                'email' => $profil['depo_email'],
                'website' => $profil['depo_website'],
                'nomor_telepon' => $profil['depo_nomor_telepon'],
                'nomor_fax' => $profil['depo_nomor_fax'],
                'akreditas' => $profil['depo_akreditas'],
                'jml_siswa_l' => 0,
                'jml_siswa_p' => 0,
            ]);
        }
    }
}
