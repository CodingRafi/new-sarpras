<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotaKabupaten extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function profilKcd(){
        return $this->hasMany(ProfilKcd::class);
    }

    public function profil(){
        return $this->hasMany(Profil::class);
    }

    public static function kota($profil, $kotaKabupaten){
        foreach ($kotaKabupaten as $key => $kota) {
            if (strtolower($profil['depo_kabupaten']) == strtolower($kota->nama)) {
                return $kota;
            }
        }
    }
}
