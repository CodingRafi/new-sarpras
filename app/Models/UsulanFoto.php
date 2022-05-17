<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanFoto extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function usulanKoleksi(){
        return $this->belongsTo(UsulanKoleksi::class);
    }

    public static function fotos($koleksis){
        $fotos = [];

        foreach($koleksis as $koleksi){
            $fotos[] = $koleksi[0]->usulanFoto; 
        }

        return $fotos;
    }
}
