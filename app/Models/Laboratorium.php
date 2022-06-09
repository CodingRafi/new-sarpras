<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorium extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function jenis_laboratorium(){
        return $this->belongsTo(JenisLaboratorium::class);
    }

    public function profil(){
        return $this->belongsTo(profil::class);
    }
}
