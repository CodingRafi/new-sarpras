<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Profil;

class Peralatan extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function komli(){
        return $this->belongsTo(Komli::class);
    }

    public function peralatanTersedia(){
        return $this->hasMany(PeralatanTersedia::class);
    }

    public function usulanPeralatan(){
        return $this->hasMany(UsulanPeralatan::class);
    }

    public static function option_peralatan_tersedia($profil, $komli_id){
        return DB::table('peralatans as a')->select('a.*')
        ->leftJoin('peralatan_tersedias as b', function($join) use ($profil){
            $join->on('a.id', '=', 'b.peralatan_id')
                ->where('b.profil_id',  $profil->id);
        })->where('a.komli_id', $komli_id)->whereNull('b.peralatan_id')->get();
    }

    public static function status_peralatan($profil){
        $peralatans = $profil->peralatanTersedia;
        $status_peralatans = [];

        foreach ($peralatans as $key => $peralatan) {
            if($peralatan->kekurangan > 0){
                $kondisi = 'Tidak Ideal';
            }else{
                $kondisi = 'Ideal';
            }

            if ($peralatan->nama == null) {
                $nama = $peralatan->peralatan->nama;
            }else{
                $nama = $peralatan->nama;
            }
            
            $status_peralatans[] = [
                'kondisi' => $kondisi,
                'kekurangan' => $peralatan->kekurangan,
                'nama' => $nama,
                'jurusan' => $peralatan->kompeten->komli->kompetensi
            ];
        }

        return $status_peralatans;
    }

    public static function status_dashboard_dinas($profil){
        $profil = Profil::find($profil->id);
        $peralatan_tidak_ideal = [];

        foreach ($profil->peralatanTersedia as $key => $peralatan) {
            if ($peralatan->kekurangan > 0) {
                if ($peralatan->nama == null) {
                    $nama = $peralatan->peralatan->nama;
                }else{
                    $nama = $peralatan->nama;
                }

                $peralatan_tidak_ideal[] = [
                    'kondisi' => 'Tidak Ideal',
                    'kekurangan' => $peralatan->kekurangan,
                    'nama' => $nama,
                    'jurusan' => $peralatan->kompeten->komli->kompetensi
                ];
            }
        }

        return $peralatan_tidak_ideal;
    }
}
