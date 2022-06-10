<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorium extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function jenis_laboratorium(){
        return $this->belongsTo(JenisLaboratorium::class);
    }

    public function profil(){
        return $this->belongsTo(profil::class);
    }

    public static function status_laboratorium($profil){
        $status_laboratorium = [];

        foreach ($profil->laboratorium as $key => $laboratorium) {
            if ($laboratorium->kekurangan > 0) {
                $kondisi = 'Tidak Ideal';
            }else{
                $kondisi = 'Ideal';
            }

            $status_laboratorium[] = [
                'jenis' => $laboratorium->jenis_laboratorium->jenis,
                'kondisi' => $kondisi,
                'kekurangan' => $laboratorium->kekurangan
            ];
        }

        return $status_laboratorium;
    }
}
