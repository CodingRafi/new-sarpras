<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProfilDepo;

class ProfilDepoSeeder extends Seeder
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
            ProfilDepo::create([
                'depo_npsn' => $profil["npsn"],
                'depo_sekolah_id' => $profil["sekolah_id"],
                'depo_nama' => $profil["nama"],
                'depo_status_sekolah' => $profil["status_sekolah"],
                'depo_alamat' => $profil["alamat"],
                'depo_provinsi' => $profil["provinsi"],
                'depo_kabupaten' => $profil["kabupaten"],
                'depo_kecamatan' => $profil["kecamatan"],
                'depo_email' => $profil["email"],
                'depo_website' => $profil["website"],
                'depo_nomor_telepon' => $profil["nomor_telepon"],
                'depo_nomor_fax' => $profil["nomor_fax"],
                'depo_akreditas' => $profil['akreditasi'],
                'depo_jml_siswa_l' => $profil['jml_siswa_l'],
                'depo_jml_siswa_p' => $profil['jml_siswa_p'],
            ]);
        }
    }
}
