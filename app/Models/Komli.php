<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komli extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function kompeten(){
        return $this->hasMany(Kompeten::class);
    }

    public function logo(){
        return $this->hasMany(Logo::class);
    }

    public function peralatan(){
        return $this->hasMany(Peralatan::class);
    }

    public static function ambilKomli($kompetens){
        $komli = [];

        foreach ($kompetens as $key => $kompeten) {
            $komli[] = Komli::where('id', $kompeten->komli_id)->get()[0];
        }

        return $komli;
    }
}
