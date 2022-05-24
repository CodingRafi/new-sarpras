<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilKcd extends Model
{
    use HasFactory;

    public function profil(){
        return $this->belongsTo(Profil::class);
    }

    public function kcd(){
        return $this->belongsTo(Kcd::class);
    }
}
