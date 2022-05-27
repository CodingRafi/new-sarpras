<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProfilDepo;
use App\Models\KompetenDepo;
use Illuminate\Support\Facades\Http;

class KompetenDepo extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public static function tambah(){
        $profilDepo = ProfilDepo::all();
        $hasilJsons =  json_decode(Http::get('http://datapokok.ditpsmk.net/api/smk_jabar_siswa'));

        
        foreach($profilDepo as $ke => $profil){
            $jml_lk = 0;
            $jml_pr = 0;

            foreach ($hasilJsons as $key => $hasil) {
                if($profil->id == $hasil->No){
                    $jml_lk += $hasil->k_l;
                    $jml_pr += $hasil->k_p;
                    
                    KompetenDepo::create([
                        'profil_depo_id' => $profil->id,
                        'bidang' => $hasil->bidang,
                        'program' => $hasil->program,
                        'kompetensi' => $hasil->jurusan,
                    ]);
                }
            }

            ProfilDepo::where('id', $profil->id)
                    ->update([
                        'depo_jml_siswa_l' => $jml_lk,
                        'depo_jml_siswa_p' => $jml_pr
                    ]);
        }
    }
}
