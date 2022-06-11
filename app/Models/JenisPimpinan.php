<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JenisPimpinan extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function pimpinan(){
        return $this->hasMany(Pimpinan::class);
    }

    public function usulanBangunan(){
        return $this->hasMany(UsulanBangunan::class);
    }

    public static function belumTerpilih(){
        return DB::table('jenis_pimpinans as a')->select('a.*')
                ->leftJoin('pimpinans as b', function($join) {
                    $join->on('a.id', '=', 'b.jenis_pimpinan_id')
                        ->where('b.profil_id',  Auth::user()->profil_id);
                })->whereNull('b.jenis_pimpinan_id')->get();
    }
}
