<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Praktik extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function profil(){
        return $this->belongsTo(Profil::class);
    }

    public function kompeten(){
        return $this->belongsTo(Kompeten::class);
    }

    // public static function ambilKompeten($profil){
    //     return DB::table('kompetens as a')->select('a.*')
    //                 ->leftJoin('praktiks as b', function($join) use ($profil){
    //                     $join->on('a.id', '=', 'b.kompeten_id')
    //                         ->where('b.profil_id',  $profil);
    //                 })->whereNull('b.kompeten_id')->get();
    // }

    // public static function kompetenSudahDIpilih($profil){
    //     return DB::table('kompetens as a')->select('a.*')
    //                 ->leftJoin('praktiks as b', function($join) use ($profil){
    //                     $join->on('a.id', '=', 'b.kompeten_id')
    //                         ->where('b.profil_id',  $profil);
    //                 })->whereNotNull('b.kompeten_id')->get();
    // }

}
