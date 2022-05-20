<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use App\Http\Requests\StoreBangunanRequest;
use App\Http\Requests\UpdateBangunanRequest;

class BangunanController extends Controller
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
     * @param  \App\Http\Requests\StoreBangunanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBangunanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bangunan  $bangunan
     * @return \Illuminate\Http\Response
     */
    public function show(Bangunan $bangunan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bangunan  $bangunan
     * @return \Illuminate\Http\Response
     */
    public function edit(Bangunan $bangunan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBangunanRequest  $request
     * @param  \App\Models\Bangunan  $bangunan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBangunanRequest $request, Bangunan $bangunan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bangunan  $bangunan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bangunan $bangunan)
    {
        //
    }
}
