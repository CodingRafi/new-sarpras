<?php

namespace App\Http\Controllers;

use App\Models\Kopetensikeahlian;
use App\Models\ProfilDepo;
use App\Models\Profil;
use App\Http\Requests\StoreKopetensikeahlianRequest;
use App\Http\Requests\UpdateKopetensikeahlianRequest;

class KopetensikeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = Profil::where('id', $id)->get()[0];
        return view('kopetensi.create', [
            'id_profil' => $id,
            'kompetens' => $data->kompeten
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKopetensikeahlianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKopetensikeahlianRequest $request)
    {
        $validatedData = $request->validate([
            'profil_id' => 'required',
            'kompeten_id' => 'required',
            'jml_lk' => 'required',
            'jml_pr' => 'required',
        ]);

        Kopetensikeahlian::create($validatedData);

        $profil = Profil::where('id', $request->profil_id)->get()[0];

        $jml_lk = 0;
        $jml_pr = 0;
        foreach($profil->kopetensikeahlian as $kopetensi){
            $jml_lk += $kopetensi->jml_lk;
            $jml_pr += $kopetensi->jml_pr;
        }

        $updateData = [
            'jml_siswa_l' => $jml_lk,
            'jml_siswa_p' => $jml_pr
        ];

        Profil::where('id', $request->profil_id)->update($updateData);
        $jml_lk = 0;
        $jml_pr = 0;

        return redirect('/profil/'. $request->profil_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kopetensikeahlian  $kopetensikeahlian
     * @return \Illuminate\Http\Response
     */
    public function show(Kopetensikeahlian $kopetensikeahlian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kopetensikeahlian  $kopetensikeahlian
     * @return \Illuminate\Http\Response
     */
    public function edit(Kopetensikeahlian $kopetensikeahlian, $id)
    {
        $data = Kopetensikeahlian::where('id', $id)->get()[0];
        $profil = Profil::where('id', $data->profil_id)->get()[0];
        return view('kopetensi.edit', [
            'data' => $data,
            'kompetens' => $profil->kompeten
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKopetensikeahlianRequest  $request
     * @param  \App\Models\Kopetensikeahlian  $kopetensikeahlian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKopetensikeahlianRequest $request, Kopetensikeahlian $kopetensikeahlian, $id)
    {
        $validatedData = $request->validate([
            'kompeten_id' => 'required',
            'jml_lk' => 'required',
            'jml_pr' => 'required',
        ]);

        Kopetensikeahlian::where('id', $id)->update($validatedData);

        $profil = Profil::where('id', $request->profil_id)->get()[0];

        $jml_lk = 0;
        $jml_pr = 0;
        foreach($profil->kopetensikeahlian as $kopetensi){
            $jml_lk += $kopetensi->jml_lk;
            $jml_pr += $kopetensi->jml_pr;
        }

        $updateData = [
            'jml_siswa_l' => $jml_lk,
            'jml_siswa_p' => $jml_pr
        ];

        Profil::where('id', $request->profil_id)->update($updateData);
        $jml_lk = 0;
        $jml_pr = 0;

        return redirect('/profil/'. $request->profil_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kopetensikeahlian  $kopetensikeahlian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kopetensikeahlian $kopetensikeahlian, $id)
    {
        $data = Kopetensikeahlian::where('id', $id)->get()[0];
        
        Kopetensikeahlian::destroy($id);
        
        $profil = Profil::where('id', $data->profil_id)->get()[0];
        
        $jml_lk = 0;
        $jml_pr = 0;
        foreach($profil->kopetensikeahlian as $kopetensi){
            $jml_lk += $kopetensi->jml_lk;
            $jml_pr += $kopetensi->jml_pr;
        }

        $updateData = [
            'jml_siswa_l' => $jml_lk,
            'jml_siswa_p' => $jml_pr
        ];

        Profil::where('id', $data->profil_id)->update($updateData);
        $jml_lk = 0;
        $jml_pr = 0;

        return redirect('/profil/'. $data->profil_id);
    }
}
