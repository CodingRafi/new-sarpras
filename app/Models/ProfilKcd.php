<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilKcd extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function kotaKabupaten(){
        return $this->belongsTo(KotaKabupaten::class);
    }

    public function kcd(){
        return $this->belongsTo(Kcd::class);
    }

    public static function createProfilKcd($kcd, $kotas){
        if(count($kotas) > 0){
            foreach ($kotas as $key => $kota_id) {
                ProfilKcd::create([
                    'kota_kabupaten_id' => $kota_id,
                    'kcd_id' => $kcd
                ]);
            }
        }
    }

    public static function ambil($kcd_id){
        return ProfilKcd::where('kcd_id', $kcd_id)->select('profils.*', 'profil_kcds.id as id_profil_kcds')
        ->leftJoin('kota_kabupatens', 'kota_kabupatens.id', 'profil_kcds.kota_kabupaten_id')
        ->leftJoin('profils', 'profils.kota_kabupaten_id', 'kota_kabupatens.id')
        ->get();
    }

    public static function getKabupaten($kcd_id){
        return ProfilKcd::where('kcd_id', $kcd_id)->select('profil_kcds.id as id_profil_kcds', 'kota_kabupatens.*')
        ->leftJoin('kota_kabupatens', 'kota_kabupatens.id', 'profil_kcds.kota_kabupaten_id')
        ->get();
    }
}
