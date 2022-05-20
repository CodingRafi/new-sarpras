<?php

namespace App\Http\Controllers;

use App\Models\Toilet;
use App\Models\Perpustakaan;
use App\Models\Log;
use App\Models\Bangunan;
use App\Models\Profil;
use App\Models\UsulanKoleksi;
use App\Models\UsulanFoto;
use App\Models\UsulanBangunan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreToiletRequest;
use App\Http\Requests\UpdateToiletRequest;

class ToiletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usulans = UsulanBangunan::where('profil_id', Auth::user()->profil_id)->where('jenis', 'toilet')->get();
        $koleksi = UsulanKoleksi::koleksi($usulans);
        $fotos = UsulanFoto::fotos($koleksi);
        $data = Bangunan::where('profil_id', Auth::user()->profil_id)->where('jenis', 'toilet')->get()[0];
        $profil = Profil::where('id', Auth::user()->profil_id)->get()[0];

        return view("bangunan.toilet.index",[
            'usulans' => $usulans,
            'usulanFotos' => $fotos,
            'data' => $data,
            'profil' => $profil
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreToiletRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreToiletRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Toilet  $toilet
     * @return \Illuminate\Http\Response
     */
    public function show(Toilet $toilet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Toilet  $toilet
     * @return \Illuminate\Http\Response
     */
    public function edit(Toilet $toilet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateToiletRequest  $request
     * @param  \App\Models\Toilet  $toilet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateToiletRequest $request, Toilet $toilet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Toilet  $toilet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toilet $toilet)
    {
        //
    }

    public function createusulan(Request $request){
        $validatedData = $request->validate([
            'luas_lahan' => 'required',
            'gambar' => 'required',
            'proposal' => 'required|mimes:pdf',
            'gambar.*' => 'mimes:jpg,jpeg,png|file|max:5120'
        ]);

        $validatedData['jml_ruang'] = 1;
        $validatedData['keterangan'] = 'Proses Pengajuan';

        UsulanBangunan::createUsulan($request, 'toilet', $validatedData);

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambahkan usulan bangunan toilet');

        return redirect()->back();
    }
}
