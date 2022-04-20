<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\ProfilDepo;
use App\Http\Requests\StoreProfilRequest;
use App\Http\Requests\UpdateProfilRequest;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jeniskompeten.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfilRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfilRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {  
        $profilDepo = ProfilDepo::where('id', $profil->id)->get()[0];
        $koleksis = $profilDepo->koleksi;
        $fotos = [];
        $komli = [];

        foreach($koleksis as $koleksi){
            $fotos[] = $koleksi->foto;
            $koleksi_id = $koleksi->id;
        }

        foreach($profil->kompeten as $kompe){
            $komli[] = $kompe->komli;
        }
        // $data = Koleksi::where('slug', $slug)->get()[0];
        // return view('foto.create',[
        //     'koleksi_id' => $data->id
        // ]);
        
        return view('profil.index', [
            'profil' => $profil,
            'kopetensikeahlians' => $profil->kopetensikeahlian,
            'koleksis' => $profilDepo->koleksi,
            'kompetens' => $profil->kompeten,
            'fotos' => $fotos,
            'komli' => $komli,
            'profil_depo' => $profilDepo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil $profil)
    {
        return view('profil.edit', [
            'data' => $profil
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfilRequest  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfilRequest $request, Profil $profil)
    {
        $jml_lk = 0;
        $jml_pr = 0;
        $validatedData = $request->validate([
            'profil_depo_id' => 'required',
            'npsn' => 'required',
            'nama' => 'required',
            'status_sekolah' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'email' => 'required',
            'website' => 'required',
            'nomor_telepon' => 'required',
            'nomor_fax' => 'required',
            'akreditas' => 'required',
            'jml_rombel' => 'required',
            'lat' => 'required',
            'long' => 'required'
        ]);
        
        if(count($profil->kopetensikeahlian) == 0){
            $validatedData['jml_siswa_l'] = 0;
            $validatedData['jml_siswa_p'] = 0;
        }else{
            foreach($profil->kopetensikeahlian as $kopetensi){
                 $jml_lk += $kopetensi->jml_lk;
                 $jml_pr += $kopetensi->jml_pr;
            }
            $validatedData['jml_siswa_l'] = $jml_lk;
            $validatedData['jml_siswa_p'] = $jml_pr;

            $jml_lk = 0;
            $jml_pr = 0;
        }

        Profil::where('id' , $profil->id)->update($validatedData);

        return redirect('/profil/' . $request->profil_depo_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        //
    }
}
