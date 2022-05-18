<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];
    protected $table ='fotos';
    protected $primaryKey = 'id';

    public function koleksi(){
        return $this->belongsTo(Koleksi::class);
    }

}
