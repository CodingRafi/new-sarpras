<?php

namespace App\Http\Controllers;

use App\Models\Kcd;
use App\Http\Requests\StoreKcdRequest;
use App\Http\Requests\UpdateKcdRequest;
use App\Models\Kompeten;

class KcdController extends Controller
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
     * @param  \App\Http\Requests\StoreKcdRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKcdRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kcd  $kcd
     * @return \Illuminate\Http\Response
     */
    public function show(Kcd $kcd)
    {
        //
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
    public function update(UpdateKcdRequest $request, Kcd $kcd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kcd  $kcd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kcd $kcd)
    {
        //
    }
}
