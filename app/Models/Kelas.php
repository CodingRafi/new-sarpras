<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function profil(){
        return $this->belongsTo(Profil::class);
    }

    public static function kondisi_ideal($jml_rombel, $ketersediaan){
        $kekurangan = $jml_rombel - $ketersediaan;

        if($kekurangan <= 0 ){
            $kekurangan = 0;
        }

        Kelas::where('profil_id', Auth::user()->profil_id)->update([
            'kondisi_ideal' => $jml_rombel,
            'kekurangan' => $kekurangan
        ]);
    }
}
