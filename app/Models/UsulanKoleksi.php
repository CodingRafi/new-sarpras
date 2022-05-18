<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanKoleksi extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function UsulanBangunan(){
        return $this->belongsTo(UsulanBangunan::class);
    }
    
    public function usulanFoto(){
        return $this->hasMany(UsulanFoto::class);
    }

    public static function koleksi($datas){
        $usulanKoleksis = [];
        foreach($datas as $data){
            $usulanKoleksis[] = $data->UsulanKoleksi;
        }

        return $usulanKoleksis;
    }
}
