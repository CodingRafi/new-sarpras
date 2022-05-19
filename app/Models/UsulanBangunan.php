<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UsulanKoleksi;
use App\Models\UsulanFoto;
use ImageOptimizer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UsulanBangunan extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function UsulanKoleksi(){
        return $this->hasMany(UsulanKoleksi::class);
    }

    public function kompeten(){
        return $this->belongsTo(Kompeten::class);
    }

    public function profil(){
        return $this->belongsTo(Profil::class);
    }

    public function usulanPraktek(){
        return $this->hasMany(UsulanPraktek::class);
    }

    public static function createUsulan($request, $jenis, $validatedData){
        $validatedData['proposal'] = $request->file('proposal')->store('proposal-usulan-bangunan');
        $validatedData['profil_id'] = Auth::user()->profil_id;
        $validatedData['jenis'] = $jenis;

        $usulanKelas = UsulanBangunan::create($validatedData);
        $usulanKoleksi = UsulanKoleksi::create(['usulan_bangunan_id' => $usulanKelas->id]);

        UsulanFoto::uploadFoto($request->gambar, $usulanKoleksi);
    }

    public static function deleteUsulan($data){
        $koleksi = $data->usulanKoleksi[0];
        $fotos = $koleksi->usulanFoto;
        UsulanFoto::deleteFoto($fotos);
        UsulanKoleksi::destroy($koleksi->id);
        Storage::delete($data->proposal);
        UsulanBangunan::destroy($data->id);
    }
}
