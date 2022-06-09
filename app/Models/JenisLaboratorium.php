<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLaboratorium extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function jenisLaboratoriumKomli(){
        return $this->hasMany(JenisLaboratoriumKomlis::class);
    }

    public function usulanBangunan(){
        return $this->hasMany(UsulanBangunan::class);
    }
}
