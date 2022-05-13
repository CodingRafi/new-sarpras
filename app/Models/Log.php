<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function user(){
        return $this->belongsTo(Users::class);
    }

    public function profil(){
        return $this->belongsTo(Profil::class);
    }
}
