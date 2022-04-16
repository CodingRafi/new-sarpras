<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Koleksi extends Model
{
    use HasFactory,Sluggable;

    protected $guarded =[
        "id"
    ];

    public function ProfilDepo(){
        return $this->belongsTo(ProfilDepo::class);
    }

    public function foto(){
        return $this->hasMany(Foto::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
