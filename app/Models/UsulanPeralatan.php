<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanPeralatan extends Model
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

    public function peralatan(){
        return $this->belongsTo(Peralatan::class);
    }
}
