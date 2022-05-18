<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Kompeten extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function profil(){
        return $this->belongsTo(Profil::class);
    }

    public function komli(){
        return $this->belongsTo(Komli::class);
    }

    public function usulanBangunan(){
        return $this->hasMany(UsulanBangunan::class);
    }

    public static function pilihanJurusan($profil){
        return DB::table('komlis as a')->select('a.*')
        ->leftJoin('kompetens as b', function($join) use ($profil){
            $join->on('a.id', '=', 'b.komli_id')
                ->where('b.profil_id',  $profil->id);
        })->whereNull('b.komli_id')->get();
    }

    
}
