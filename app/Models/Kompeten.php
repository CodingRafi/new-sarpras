<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;

class Kompeten extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function profil(){
        return $this->belongsTo(Profil::class);
    }

    public function komli(){
        return $this->belongsTo(Komli::class);
    }

    public function usulanBangunan(){
        return $this->hasMany(UsulanBangunan::class);
    }
    
    public function peralatanTersedia(){
        return $this->hasMany(PeralatanTersedia::class);
    }

    public function usulanPeralatan(){
        return $this->hasMany(UsulanPeralatan::class);
    }

    public function praktik(){
        return $this->hasMany(Praktik::class);
    }

    public static function pilihanJurusan($profil){
        return DB::table('komlis as a')->select('a.*')
        ->leftJoin('kompetens as b', function($join) use ($profil){
            $join->on('a.id', '=', 'b.komli_id')
                ->where('b.profil_id',  $profil->id);
        })->whereNull('b.komli_id')->get();
    }

    public static function getKompeten(){
        if(Auth::user() != null){
            if (Auth::user()->hasRole('sekolah')) {
                $kompils = Kompeten::where('profil_id', Auth::user()->profil_id)->select('kompetens.*', 'komlis.kompetensi')->leftJoin('komlis', 'komlis.id' , 'kompetens.komli_id')->get();
                return $kompils;
            }
        }
    }

    public static function hapusKompeten($kompetens){
        foreach ($kompetens as $key => $kompeten) {

            // Profil
            $jml_lk = 0;
            $jml_pr = 0;
            if(count($kompeten->profil->kompeten) == 0){
                Profil::where('id', $kompeten->profil->id)->update([
                    'jml_siswa_l' => 0,
                    'jml_siswa_p' => 0,
                ]);
            }else{
                foreach($kompeten->profil->kompeten as $kopetensi){
                     $jml_lk += $kopetensi->jml_lk;
                     $jml_pr += $kopetensi->jml_pr;
                }
                Profil::where('id', $kompeten->profil->id)->update([
                    'jml_siswa_l' => $jml_lk,
                    'jml_siswa_p' => $jml_pr,
                ]);
    
                $jml_lk = 0;
                $jml_pr = 0;
            }

            // Usulan Bangunan
            $usulanBangunans = UsulanBangunan::where('kompeten_id', $kompeten->id)->get();
            foreach ($usulanBangunans as $usulan) {
                UsulanBangunan::deleteUsulan($usulan);
            }

            $usulanPeralatans = UsulanPeralatan::where('kompeten_id', $kompeten->id)->get();
            foreach ($usulanPeralatans as $usulan) {
                Storage::delete($usulan->proposal);
                UsulanPeralatan::destroy($usulan->id);
            }

            $praktiks = Praktik::where('kompeten_id', $kompeten->id)->get();
            foreach ($praktiks as $praktik) {
                Praktik::destroy($data->id);
            }

            Kompeten::destroy($kompeten->id);

        }
    }
    
    public static function status_kompeten($profil){
        $status_kompeten = [];

        foreach ($profil->kompeten as $key => $kompeten) {
            if ($kompeten->kekurangan > 0) {
                $kondisi = 'Tidak Ideal';
            }else{
                $kondisi = 'Ideal';
            }

            $status_kompeten[] = [
                'jenis' => $kompeten->komli->kompetensi,
                'kondisi' => $kondisi,
                'kekurangan' => $kompeten->kekurangan
            ];
        }

        return $status_kompeten;
    }
}
