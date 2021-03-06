<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class JenisLaboratoriumKomlis extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function jenisLaboratorium(){
        return $this->belongsTo(JeniLaboratorium::class);
    }

    public function komlis(){
        return $this->belongsTo(komli::class);
    }
}
