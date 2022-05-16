<?php

namespace App\Http\Controllers\Lahan_sekolah;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LahanController extends Controller
{
    public function index(){
        return view('lahan.index');
    }
}
