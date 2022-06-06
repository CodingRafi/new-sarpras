<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnsurVerifikasi extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function hasilVisitasi(){
        return $this->hasMany(HasilVisitasi::class);
    }
}
