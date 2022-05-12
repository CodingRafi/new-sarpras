<?php

namespace App\Http\Controllers;

use App\Models\Komputer;
use App\Http\Requests\StoreKomputerRequest;
use App\Http\Requests\UpdateKomputerRequest;

class KomputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("bangunan.labKomputer.komputer");
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
}
