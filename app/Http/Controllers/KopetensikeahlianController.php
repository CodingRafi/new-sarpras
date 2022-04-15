<?php

namespace App\Http\Controllers;

use App\Models\Kopetensikeahlian;
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
        return view('kopetensi.create', [
            'id_profil' => $id,
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
            'nama' => 'required',
            'jml_lk' => 'required',
            'jml_pr' => 'required',
        ]);

        Kopetensikeahlian::create($validatedData);

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
        return view('kopetensi.edit', [
            'data' => $data
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
            'profil_id' => 'required',
            'nama' => 'required',
            'jml_lk' => 'required',
            'jml_pr' => 'required',
        ]);

        Kopetensikeahlian::where('id', $id)->update($validatedData);

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

        return redirect('/profil/'. $data->profil_id);
    }
}
