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

    public function logo(){
        return $this->hasMany(Logo::class);
    }

    public function log(){
        return $this->hasMany(Log::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bangunan(){
        return $this->belongsTo(Bangunan::class);
    }

    public function usulanBangunan(){
        return $this->hasMany(UsulanBangunan::class);
    }

    public function pimpinan(){
        return $this->hasMany(Pimpinan::class);
    }

    public function praktik(){
        return $this->hasMany(Praktik::class);
    }

    public function profilKcd(){
        return $this->hasMany(ProfilKcd::class);
    }

    public function usulanLahan(){
        return $this->hasMany(UsulanLahan::class);
    }

    public function scopeSearch($query, array $search)
    {
        // dd($query->where('npsn', 'like', '%' . $search['search'] . '%'));
        $query->when($search['search'] ?? false, function($query, $search){
            return $query->where('profils.npsn', 'like', '%' . $search . '%')
                        ->orWhere('profils.sekolah_id', 'like', '%' . $search . '%')
                        ->orWhere('profils.nama', 'like', '%' . $search . '%');
        });

    }

    public function scopeFilter($query, array $filters){
        // dd($filters['filter'] == 'kota');
        if(isset($filters['filter'])){
            if($filters['filter'] == 'kota'){
                return $query->orderBy('profils.kabupaten', 'asc');
            }
    
            if($filters['filter'] == 'kcd'){
                return $query->orderBy('kcds.instansi', 'asc');
            }
        }

    }
}
