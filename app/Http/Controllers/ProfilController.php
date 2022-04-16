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
        //
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil $profil, $id)
    {
        $data = ProfilDepo::where('id', $id)->get()[0];
        return view('profil.edit', [
            'data' => $data
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
        ]);
        
        $profilDepo = ProfilDepo::where('id', $request->profil_depo_id)->get()[0];
        if(count($profilDepo->kopetensikeahlian) == 0){
            $validatedData['jml_siswa_l'] = 0;
            $validatedData['jml_siswa_p'] = 0;
        }else{
            foreach($profilDepo->kopetensikeahlian as $kopetensi){
                 $jml_lk += $kopetensi->jml_lk;
                 $jml_pr += $kopetensi->jml_pr;
            }
            $validatedData['jml_siswa_l'] = $jml_lk;
            $validatedData['jml_siswa_p'] = $jml_pr;

            $jml_lk = 0;
            $jml_pr = 0;
        }

        Profil::where('id' , $request->profil_depo_id)->update($validatedData);

        return redirect('/profildepo/' . $request->profil_depo_id);

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
