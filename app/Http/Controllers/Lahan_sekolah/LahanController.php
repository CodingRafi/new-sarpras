<?php

namespace App\Http\Controllers\Lahan_sekolah;

use Illuminate\Http\Request;
use App\Models\KetersediaanLahan;
use App\Models\KekuranganLahan;
use App\Models\UsulanLahan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Kompeten;

class LahanController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_lahan', ['only' => ['index']]);
    }

    public function index(){
        $ketersediaanLahan = KetersediaanLahan::where('profil_id', Auth::user()->profil_id)->get();
        $kekuranganLahan = KekuranganLahan::where('profil_id', Auth::user()->profil_id)->get();
        $usulanLahan = UsulanLahan::where('profil_id', Auth::user()->profil_id)->get();

        $luasKekuranganLahan = 0;
        $luasKetersediaanLahan = 0;
        $shm = 0;
        $hgb = 0;
        $sewa = 0;
        $hibah = 0;
        $tanah_desa = 0;

        foreach($kekuranganLahan as $lahan){
            $luasKekuranganLahan += $lahan->luas;
        }

        foreach($ketersediaanLahan as $lahan){
            if($lahan->jenis_kepemilikan == 'shm'){
                $shm += 1;
            }else if($lahan->jenis_kepemilikan == 'hgb'){
                $hgb += 1;
            }else if($lahan->jenis_kepemilikan == 'sewa'){
                $sewa += 1; 
            }else if($lahan->jenis_kepemilikan == 'hibah'){
                $hibah += 1;
            }else{
                $tanah_desa += 1;
            }
            $luasKetersediaanLahan += $lahan->luas;
        }

        return view('lahan.index',[
            'ketersediaanLahans' => $ketersediaanLahan,
            'kekuranganLahans' => $kekuranganLahan,
            'usulanLahans' => $usulanLahan,
            'luasKekuranganLahan' => $luasKekuranganLahan,
            'luasKetersediaanLahan' => $luasKetersediaanLahan,
            'shm' => $shm,
            'hgb' => $hgb,
            'sewa' => $sewa,
            'hibah' => $hibah,
            'tanah_desa' => $tanah_desa,
            'kompils' => Kompeten::getKompeten()
        ]);
    }
}
 