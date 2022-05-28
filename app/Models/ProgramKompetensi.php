<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKompetensi extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function komli(){
        return $this->hasMany(Komli::class);
    }
}
