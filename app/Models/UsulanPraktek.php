<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanPraktek extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function kompeten(){
        return $this->belongsTo(Kompeten::class);
    }

    public function profil(){
        return $this->belongsTo(Profil::class);
    }

    public function usulanPraktek(){
        return $this->hasMany(UsulanPraktek::class);
    }
}
