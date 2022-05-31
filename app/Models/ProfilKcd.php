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

    public static function createProfilKcd($kcd, $sekolah){
        if(count($sekolah) > 0){
            foreach ($sekolah as $key => $profil_id) {
                ProfilKcd::create([
                    'profil_id' => $profil_id,
                    'kcd_id' => $kcd
                ]);
            }
        }
    }
}
