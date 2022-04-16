<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class ProfilDepo extends Model
{
    use HasFactory;

    public static function DataProfilSekolah(){
        $links = [
            'http://datapokok.ditpsmk.net/api/smk_jabar',
            'http://datapokok.ditpsmk.net/api/smk_jabar_akreditasi',
            'http://datapokok.ditpsmk.net/api/smk_jabar_siswa'
        ];
        $hasilJsons = [];
        foreach ($links as $link){
            $hasilJsons[] =  json_decode(Http::get($link));
        }

        $data = [];
        foreach ($hasilJsons[0] as $key => $hasil){
            $data[] = [
                'npsn' => $hasil->npsn,
                'sekolah_id' => $hasil->sekolah_id,
                'nama' => $hasil->nama,
                'status_sekolah' => $hasil->status_sekolah,
                'alamat' => $hasil->alamat,
                'provinsi' => $hasil->provinsi,
                'kabupaten' => $hasil->kabupaten,
                'kecamatan' => $hasil->kecamatan,
                'email' =>  $hasil->email,
                'website' => $hasil->website,
                'nomor_telepon' => $hasil->nomor_telepon,
                'nomor_fax' => $hasil->nomor_fax,
                'akreditasi' => $hasilJsons[1][$key]->akreditasi,
                'jml_siswa_l' => $hasilJsons[2][$key]->k_l,
                'jml_siswa_p' => $hasilJsons[2][$key]->k_p,
                'bidang' => $hasilJsons[2][$key]->bidang,
                'program' => $hasilJsons[2][$key]->program,
                'jurusan' => $hasilJsons[2][$key]->jurusan,
            ];
        }

        return $data;
    }

    public function profil(){
        return $this->belongsTo(Profil::class);
    }

    public function kopetensikeahlian(){
        return $this->hasMany(Kopetensikeahlian::class);
    }

    public function koleksi(){
        return $this->hasMany(Koleksi::class);
    }
}
