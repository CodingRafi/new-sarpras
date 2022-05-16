<?php

namespace App\Http\Controllers\Lahan_sekolah;

use Illuminate\Http\Request;
use App\Models\KetersediaanLahan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LahanController extends Controller
{
    public function index(){
        $ketersediaanLahan = KetersediaanLahan::where('profil_id', Auth::user()->profil_id)->get();

        return view('lahan.index',[
            'ketersediaanLahans' => $ketersediaanLahan
        ]);
    }
}
