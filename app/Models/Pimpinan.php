<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pimpinan extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function profil(){
        return $this->belongsTo(Profil::class);
    }

    public function jenisPimpinan(){
        return $this->belongsTo(JenisPimpinan::class);
    }

    public function usulanBangunan(){
        return $this->hasMany(UsulanBangunan::class);
    }

    public static function status_pimpinan($profil){
        return Pimpinan::select('pimpinans.*', 'jenis_pimpinans.nama')
                        ->where('pimpinans.profil_id', $profil->id)
                        ->leftJoin('jenis_pimpinans', 'jenis_pimpinans.id', 'pimpinans.jenis_pimpinan_id')
                        ->get();
    }
}
