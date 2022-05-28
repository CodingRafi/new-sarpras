<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spektrum extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function komli(){
        return $this->hasMany(Komli::class);
    }
}
