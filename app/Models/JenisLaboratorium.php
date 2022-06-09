<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;

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
        return $jenis =  DB::table('jenis_laboratoria as a')->select('a.*')
                ->leftJoin('laboratoria as b', function($join) {
                    $join->on('a.id', '=', 'b.jenis_laboratorium_id')
                        ->where('b.profil_id',  Auth::user()->profil_id);
                })->whereNull('b.jenis_laboratorium_id')->get();
    } 
}
