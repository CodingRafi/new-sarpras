<?php

namespace App\Http\Controllers;

use App\Models\ProfilDepo;
use App\Models\Profil;
use App\Http\Requests\StoreProfilDepoRequest;
use App\Http\Requests\UpdateProfilDepoRequest;

class ProfilDepoController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfilDepoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfilDepoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfilDepo  $profilDepo
     * @return \Illuminate\Http\Response
     */
    public function show(ProfilDepo $profilDepo, $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfilDepo  $profilDepo
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfilDepo $profilDepo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfilDepoRequest  $request
     * @param  \App\Models\ProfilDepo  $profilDepo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfilDepoRequest $request, ProfilDepo $profilDepo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfilDepo  $profilDepo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfilDepo $profilDepo)
    {
        //
    }
}
