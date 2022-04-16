<?php

namespace App\Http\Controllers;

use App\Models\Kompeten;
use App\Http\Requests\StoreKompetenRequest;
use App\Http\Requests\UpdateKompetenRequest;

class KompetenController extends Controller
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
        return view('jeniskompeten.create', [
            'profil_id' => $id 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKompetenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKompetenRequest $request)
    {
        $validatedData = $request->validate([
            'profil_id' => 'required',
            'nama' => 'required'
        ]);

        Kompeten::create($validatedData);

        return redirect('/profil/' . $request->profil_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kompeten  $kompeten
     * @return \Illuminate\Http\Response
     */
    public function show(Kompeten $kompeten)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kompeten  $kompeten
     * @return \Illuminate\Http\Response
     */
    public function edit(Kompeten $kompeten)
    {
        return view('jeniskompeten.edit', [
            'data' => $kompeten
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKompetenRequest  $request
     * @param  \App\Models\Kompeten  $kompeten
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKompetenRequest $request, Kompeten $kompeten)
    {
        $validatedData = $request->validate([
            'profil_id' => 'required',
            'nama' => 'required'
        ]);

        Kompeten::where('id', $kompeten->id)->update($validatedData);

        return redirect('/profil/' . $request->profil_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kompeten  $kompeten
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kompeten $kompeten)
    {
        Kompeten::destroy($kompeten->id);

        return redirect('/profil/' . $kompeten->id);
    }
}
