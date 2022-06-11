<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KekuranganLahan extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function profil(){
        return $this->belongsTo(Profil::class);
    }

    public static function status_kekurangan($profil){
        if (count($profil->kekuranganLahan) > 0) {
            $jml_kekurangan_lahan = 0;
            foreach ($profil->kekuranganLahan as $key => $kekurangan) {
                $jml_kekurangan_lahan += $kekurangan->luas;
            }

            $status_lahan = [
                'kondisi' => 'Tidak Ideal',
                'kekurangan' => $jml_kekurangan_lahan
            ];
        }else{
            $status_lahan = [
                'kondisi' => 'Ideal',
                'kekurangan' => 0
            ];
        }

        return $status_lahan;
    }
}
