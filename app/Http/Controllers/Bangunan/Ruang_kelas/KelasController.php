<?php

namespace App\Http\Controllers\Bangunan\Ruang_kelas;

use App\Models\Kelas;
use App\Models\UsulanKelas;
use App\Models\UsulanKoleksi;
use App\Models\UsulanFoto;
use App\Models\Profil;
use App\Models\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usulanKelas = UsulanKelas::where('profil_id', Auth::user()->profil_id)->get();
        $koleksi = UsulanKoleksi::koleksi($usulanKelas);
        $fotos = UsulanFoto::fotos($koleksi);
        $data = Kelas::where('profil_id', Auth::user()->profil_id)->get()[0];
        $profil = Profil::where('id', Auth::user()->profil_id)->get()[0];

        return view("bangunan.kelas.index",[
            'usulanKelas' => $usulanKelas,
            'usulanFotos' => $fotos,
            'dataKelas' => $data,
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
     * @param  \App\Http\Requests\StoreKelasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKelasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKelasRequest  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKelasRequest $request, Kelas $kelas)
    {
        $data = Kelas::where('id', $request->id_ruangKelas)->get()[0];
        if($data->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'ketersediaan' => 'numeric',
                'kekurangan' => 'numeric',
            ]);

            $data->update($validatedData);

            if($request->ketersediaan != ''){
                Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah jumlah ketersediaan ruang kelas');
            }else{
                Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah jumlah kekurangan ruang kelas');
            }

            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        //
    }

}
