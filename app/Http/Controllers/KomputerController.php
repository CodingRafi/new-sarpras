<?php

namespace App\Http\Controllers;

use App\Models\Komputer;
use App\Models\UsulanBangunan;
use App\Models\UsulanKoleksi;
use App\Models\UsulanFoto;
use App\Models\Bangunan;
use App\Models\Profil;
use App\Http\Requests\StoreKomputerRequest;
use App\Http\Requests\UpdateKomputerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Log;

class KomputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usulans = UsulanBangunan::where('profil_id', Auth::user()->profil_id)->where('jenis', 'lab_komputer')->get();
        $koleksi = UsulanKoleksi::koleksi($usulans);
        $fotos = UsulanFoto::fotos($koleksi);
        $data = Bangunan::where('profil_id', Auth::user()->profil_id)->where('jenis', 'lab_komputer')->get()[0];
        $profil = Profil::where('id', Auth::user()->profil_id)->get()[0];

        return view("bangunan.labKomputer.komputer",[
            'usulanLabKomputers' => $usulans,
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
     * @param  \App\Http\Requests\StoreKomputerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKomputerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Komputer  $komputer
     * @return \Illuminate\Http\Response
     */
    public function show(Komputer $komputer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Komputer  $komputer
     * @return \Illuminate\Http\Response
     */
    public function edit(Komputer $komputer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKomputerRequest  $request
     * @param  \App\Models\Komputer  $komputer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKomputerRequest $request, Komputer $komputer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Komputer  $komputer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Komputer $komputer)
    {
        //
    }

    public function createusulan(Request $request){
        $validatedData = $request->validate([
            'jml_ruang' => 'required',
            'luas_lahan' => 'required',
            'gambar' => 'required',
            'proposal' => 'required|mimes:pdf',
            'gambar.*' => 'mimes:jpg,jpeg,png|file|max:5120'
        ]);

        $validatedData['keterangan'] = 'Proses Pengajuan';

        UsulanBangunan::createUsulan($request, 'lab_komputer', $validatedData);

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambahkan usulan Lab Komputer');

        return redirect()->back();
    }
}
