<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanKelas extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function UsulanKoleksi(){
        return $this->hasMany(UsulanKoleksi::class);
    }
}
