<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Bangunan extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function profil(){
        return $this->belongsTo(Profil::class);
    }

    public static function kondisi_ideal($jml_rombel, $ketersediaan, $jenis){
        if($jml_rombel === null){
            $jml_rombel = 0;
        }

        $kekurangan = $jml_rombel - $ketersediaan;

        if($kekurangan <= 0 ){
            $kekurangan = 0;
        }

        Bangunan::where('profil_id', Auth::user()->profil_id)->where('jenis', $jenis)->update([
            'kondisi_ideal' => $jml_rombel,
            'kekurangan' => $kekurangan
        ]);
    }
}
