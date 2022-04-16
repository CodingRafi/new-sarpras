<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function profildepo(){
        return $this->belongsTo(ProfilDepo::class);
    }

    public function kompeten(){
        return $this->hasMany(Kompeten::class);
    }

    public function kopetensikeahlian(){
        return $this->hasMany(Kopetensikeahlian::class);
    }

    public function scopeSearch($query, array $search)
    {
        // dd($query->where('npsn', 'like', '%' . $search['search'] . '%'));
        $query->when($search['search'] ?? false, function($query, $search){
            return $query->where('npsn', 'like', '%' . $search . '%')
                        ->orWhere('sekolah_id', 'like', '%' . $search . '%')
                        ->orWhere('nama', 'like', '%' . $search . '%');
        });

    }
}
