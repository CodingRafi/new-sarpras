<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KekuranganLahan extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function profil(){
        return $this->belongsTo(Profil::class);
    }
}
