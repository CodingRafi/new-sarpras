<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;

    public function profildepo(){
        return $this->belongsTo(Profil::class);
    }

    public function komli(){
        return $this->belongsTo(Komli::class);
    }
}
