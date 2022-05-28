<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peralatan extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function komli(){
        return $this->belongsTo(Komli::class);
    }

    public function peralatanTersedia(){
        return $this->hasMany(PeralatanTersedia::class);
    }

    public function usulanPeralatan(){
        return $this->hasMany(UsulanPeralatan::class);
    }
}
