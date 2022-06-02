<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use DB;


class Koleksi extends Model
{
    use HasFactory,Sluggable;

    protected $guarded =[
        "id"
    ];

    public function ProfilDepo(){
        return $this->belongsTo(ProfilDepo::class);
    }

    public function foto(){
        return $this->hasMany(Foto::class);
    }

    public function jeniskoleksi(){
        return $this->belongsTo(Jeniskoleksi::class);
    }

    public function riwayat(){
        return $this->belongsTo(Riwayat::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public static function jenisPilihan($profil){
        return DB::table('jeniskoleksis as a')->select('a.*')
                ->leftJoin('koleksis as b', function($join) use ($profil){
                        $join->on('a.id', '=', 'b.jeniskoleksi_id')
                            ->where('b.profil_depo_id',  $profil->id);
                })->whereNull('b.jeniskoleksi_id')->get();
    }
}
