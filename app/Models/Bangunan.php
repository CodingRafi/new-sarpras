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

    public function scopeFilter($query, array $search)
    {
        $query->when($search['jenis'] ?? false, function($query, $jenis){
            return $query->where('bangunans.jenis', $jenis);
        });
    }

    public static function status_bangunan($profil){
        $status_bangunan = [];

        foreach ($profil->bangunan as $key => $bangunan) {
            if ($bangunan->kekurangan > 0) {
                $kondisi = 'Tidak Ideal';
            }else{
                $kondisi = 'Ideal';
            }

            $status_bangunan[] = [
                'jenis' => $bangunan->jenis,
                'kondisi' => $kondisi,
                'kekurangan' => $bangunan->kekurangan
            ];
        }

        return $status_bangunan;
    }

    public static function status_bangunan_dinas($profil){
        $bangunan_all = Bangunan::status_bangunan($profil);
        $laboratorium = Laboratorium::status_laboratorium($profil);
        $kompetens = Kompeten::status_kompeten($profil);

        $bangunan_tidak_ideal = [];

        foreach ($bangunan_all as $key => $bangunan) {
            if ($bangunan['kekurangan'] > 0) {
                $bangunan_tidak_ideal = [
                    'kategori' => 'all',
                    'jenis' => $bangunan['jenis'],
                    'kondisi' => 'Tidak Ideal',
                    'kekurangan' => $bangunan['kekurangan']
                ];
            }
        }

        foreach ($laboratorium as $key => $lab) {
            if ($lab['kekurangan'] > 0) {
                $bangunan_tidak_ideal[] = [
                    'kategori' => 'lab',
                    'jenis' => $lab['jenis'],
                    'kondisi' => 'Tidak Ideal',
                    'kekurangan' => $lab['kekurangan']
                ];
            }
        }

        foreach ($kompetens as $key => $kompeten) {
            if ($kompeten['kekurangan'] > 0) {
                $bangunan_tidak_ideal[] = [
                    'kategori' => 'praktik',
                    'jenis' => $kompeten['jenis'],
                    'kondisi' => 'Tidak Ideal',
                    'kekurangan' => $kompeten['kekurangan']
                ];
            }
        }
       
        return $bangunan_tidak_ideal;

    }
}
