<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class ProfilDepo extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

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

        $jml_lk = 0;
        $jml_pr = 0;

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
                'jml_siswa_l' => $jml_lk,
                'jml_siswa_p' => $jml_pr,
            ];
        }

        $jml_lk = 0;
        $jml_pr = 0;

        return $data;
    }

    public function profil(){
        return $this->belongsTo(Profil::class);
    }

    public function koleksi(){
        return $this->hasMany(Koleksi::class);
    }
}
