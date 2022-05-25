<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RehabRenov extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function UsulanKoleksi(){
        return $this->hasMany(UsulanKoleksi::class);
    }

    public function profil(){
        return $this->belongsTo(Profil::class);
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
