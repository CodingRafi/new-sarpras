<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JenisLaboratorium extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function jenisLaboratoriumKomli(){
        return $this->hasMany(JenisLaboratoriumKomlis::class);
    }

    public function usulanBangunan(){
        return $this->hasMany(UsulanBangunan::class);
    }

    public function laboratorium(){
        return $this->hasMany(Laboratorium::class);
    }

    public static function belumTerpilih(){
        return DB::table('jenis_laboratoria as a')->select('a.*')
                ->leftJoin('laboratoria as b', function($join) {
                    $join->on('a.id', '=', 'b.jenis_laboratorium_id')
                        ->where('b.profil_id',  Auth::user()->profil_id);
                })->whereNull('b.jenis_laboratorium_id')->get();
    } 

    public static function getJenis($id){
        return JenisLaboratorium::select('jenis_laboratoria.*', 'komlis.*', 'jenis_laboratoria.id as id_jenis_laboratorium', 'komlis.id as id_komlis','jenis_laboratorium_komlis.id as id_jenis_laboratorium_komlis')
        ->where('jenis_laboratoria.id', $id)
        ->leftJoin('jenis_laboratorium_komlis', 'jenis_laboratorium_komlis.jenis_laboratorium_id', 'jenis_laboratoria.id')
        ->leftJoin('komlis', 'komlis.id', 'jenis_laboratorium_komlis.komli_id')
        ->get();
    }
}
