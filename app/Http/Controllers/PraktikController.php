<?php

namespace App\Http\Controllers;

use App\Models\Praktik;
use App\Http\Requests\StorePraktikRequest;
use App\Http\Requests\UpdatePraktikRequest;

class PraktikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("bangunan.praktik.index");
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
     * @param  \App\Http\Requests\StorePraktikRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePraktikRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Praktik  $praktik
     * @return \Illuminate\Http\Response
     */
    public function show(Praktik $praktik)
    {
        return view("bangunan.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Praktik  $praktik
     * @return \Illuminate\Http\Response
     */
    public function edit(Praktik $praktik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePraktikRequest  $request
     * @param  \App\Models\Praktik  $praktik
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePraktikRequest $request, Praktik $praktik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Praktik  $praktik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Praktik $praktik)
    {
        //
    }
}
