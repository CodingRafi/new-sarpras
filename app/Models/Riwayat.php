<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function usulanKoleksi(){
        return $this->hasMany(UsulanKoleksi::class);
    }

    public function profil(){
        return $this->belongsTo(Profil::class);
    }

    public function scopeSearch($query, array $search)
    {
        // dd($query->where('npsn', 'like', '%' . $search['search'] . '%'));
        $query->when($search['search'] ?? false, function($query, $search){
            return $query->where('profils.npsn', 'like', '%' . $search . '%')
                        ->orWhere('profils.sekolah_id', 'like', '%' . $search . '%')
                        ->orWhere('profils.nama', 'like', '%' . $search . '%');
        });

    }

    public static function get_sum_riwayat($profil){
        $usulans = Riwayat::where('profil_id', $profil->id)
                                ->leftJoin('profils', function($join) use ($profil){
                                    $join->where('profils.id', $profil->id);
                                })
                                ->leftJoin('kota_kabupatens', 'kota_kabupatens.id', 'profils.kota_kabupaten_id')
                                ->leftJoin('profil_kcds', 'kota_kabupatens.id', 'profil_kcds.kota_kabupaten_id')
                                ->leftJoin('kcds', 'kcds.id', 'profil_kcds.kcd_id')
                                ->select('profils.nama', 'riwayats.*')
                                ->get();

        return count($usulans);
    }
}
