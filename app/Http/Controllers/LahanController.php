<?php

namespace App\Http\Controllers;

use App\Models\Lahan;
use App\Http\Requests\StoreLahanRequest;
use App\Http\Requests\UpdateLahanRequest;

class LahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("lahan.index");
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
     * @param  \App\Http\Requests\StoreLahanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLahanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lahan  $lahan
     * @return \Illuminate\Http\Response
     */
    public function show(Lahan $lahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lahan  $lahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Lahan $lahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLahanRequest  $request
     * @param  \App\Models\Lahan  $lahan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLahanRequest $request, Lahan $lahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lahan  $lahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lahan $lahan)
    {
        //
    }
}
