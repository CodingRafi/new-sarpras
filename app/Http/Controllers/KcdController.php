<?php

namespace App\Http\Controllers;

use App\Models\Kcd;
use App\Http\Requests\StoreKcdRequest;
use App\Http\Requests\UpdateKcdRequest;
use App\Models\Kompeten;
use App\Models\Profil;
use App\Models\ProfilKcd;
use Illuminate\Support\Facades\Auth;


class KcdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kcds = Kcd::all();
        $profil_kcd = [];
        foreach ($kcds as $key => $kcd) {
            $profil_kcd[] = $kcd->profilKcd;
        }

        $profils = Profil::noKcd();

        return view('admin.cadisdik.cadisdik', [
            'profils' => $profils,
            'kcds' => $kcds,
            'profil_kcds' => $profil_kcd
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
     * @param  \App\Http\Requests\StoreKcdRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKcdRequest $request)
    {
        if (Auth::user()->hasRole('dinas')) {
            $validatedData = $request->validate([
                'nama' => 'required',
                'instansi' => 'required',
                'kab' => 'required'
            ]);
    
            $validatedData['provinsi'] = 'Jawa Barat';
    
            $kcd = Kcd::create($validatedData);

            ProfilKcd::createProfilKcd($kcd->id, $request->sekolah);

            return redirect('/cadisdik/' . $kcd->id);

        }else{
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kcd  $kcd
     * @return \Illuminate\Http\Response
     */
    public function show(Kcd $kcd, $id)
    {
        $profils = ProfilKcd::where('kcd_id', $id)->select('profils.*', 'profil_kcds.id as id_profil_kcds')->leftJoin('profils', 'profils.id', 'profil_kcds.profil_id')->get();
        $kcd = Kcd::where('id', $id)->get()[0];
        $sekolahNoKcd = Profil::noKcd();
        return view('admin.cadisdik.cadisdikDetil', [
            'profils' => $profils,
            'kcd' => $kcd,
            'sekolahNoKcds' => $sekolahNoKcd
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kcd  $kcd
     * @return \Illuminate\Http\Response
     */
    public function edit(Kcd $kcd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKcdRequest  $request
     * @param  \App\Models\Kcd  $kcd
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKcdRequest $request, Kcd $kcd, $id)
    {
        if(Auth::user()->hasRole('dinas')){
            $validatedData = $request->validate([
                'nama' => 'required',
                'instansi' => 'required',
                'kab' => 'required'
            ]);

            $kcd = Kcd::where('id', $id)->get()[0];
            $kcd->update($validatedData);
            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kcd  $kcd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kcd $kcd, $id)
    {
        if(Auth::user()->hasRole('dinas')){
            $profilKcds = ProfilKcd::where('kcd_id', $id)->get();
            foreach ($profilKcds as $key => $profilKcd) {
                ProfilKcd::destroy($profilKcd->id);
            }
            Kcd::destroy($id);
            return redirect()->back();
        }else{
            abort(403);
        }
    }
}
