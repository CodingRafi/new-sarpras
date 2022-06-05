<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilVisitasi extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function visitasi(){
        return $this->belongsTo(Visitasi::class);
    }

    public function unsurVerifikasi(){
        return $this->belongsTo(UnsurVerifikasi::class);
    }
}
