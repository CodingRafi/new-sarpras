<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPimpinan extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function pimpinan(){
        return $this->hasMany(Pimpinan::class);
    }

    public function usulanBangunan(){
        return $this->hasMany(UsulanBangunan::class);
    }
}
