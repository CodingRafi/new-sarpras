<?php

namespace App\Http\Controllers;

use App\Models\Komli;
use App\Http\Requests\StoreKomliRequest;
use App\Http\Requests\UpdateKomliRequest;

class KomliController extends Controller
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
     * @param  \App\Http\Requests\StoreKomliRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKomliRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Komli  $komli
     * @return \Illuminate\Http\Response
     */
    public function show(Komli $komli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Komli  $komli
     * @return \Illuminate\Http\Response
     */
    public function edit(Komli $komli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKomliRequest  $request
     * @param  \App\Models\Komli  $komli
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKomliRequest $request, Komli $komli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Komli  $komli
     * @return \Illuminate\Http\Response
     */
    public function destroy(Komli $komli)
    {
        //
    }
}
