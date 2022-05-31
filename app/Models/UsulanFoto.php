<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ImageOptimizer;
use Illuminate\Support\Facades\Storage;

class UsulanFoto extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function usulanKoleksi(){
        return $this->belongsTo(UsulanKoleksi::class);
    }

    public static function fotos($koleksis){
        $fotos = [];

        foreach($koleksis as $koleksi){
            if(count($koleksi) > 0){
                $fotos[] = $koleksi[0]->usulanFoto; 
            }else{
                $fotos[] = [[]];
            }
        }
        
        return $fotos;
    }

    public static function uploadFoto($gambar, $koleksi){
        if(count($gambar) > 0){ // mengecek lagi bener bener ada gak isinya
            $files = [];
            foreach($gambar as $file){
                $nama = $file->store('fotoUsulan');
                ImageOptimizer::optimize('storage/' . $nama);
                UsulanFoto::create([
                    'usulan_koleksi_id' => $koleksi->id,
                    'nama' => $nama
                ]);
            }
        }
    }

    public static function uploadFotoRiwayat($gambar, $koleksi){
        if(count($gambar) > 0){ // mengecek lagi bener bener ada gak isinya
            $files = [];
            foreach($gambar as $file){
                $nama = $file->store('riwayat');
                ImageOptimizer::optimize('storage/' . $nama);
                UsulanFoto::create([
                    'usulan_koleksi_id' => $koleksi->id,
                    'nama' => $nama
                ]);
            }
        }
    }

    public static function deleteFoto($fotos){
        foreach ($fotos as $key => $foto) {
            Storage::delete($foto->nama);
            UsulanFoto::destroy($foto->id);
        }
    }
}
