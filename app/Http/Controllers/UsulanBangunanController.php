<?php

namespace App\Http\Controllers;

use App\Models\UsulanBangunan;
use App\Models\Log;
use App\Models\UsulanKoleksi;
use App\Models\UsulanFoto;
use ImageOptimizer;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUsulanBangunanRequest;
use App\Http\Requests\UpdateUsulanBangunanRequest;
use Illuminate\Support\Facades\Storage;

class UsulanBangunanController extends Controller
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
     * @param  \App\Http\Requests\StoreUsulanBangunanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsulanBangunanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsulanBangunan  $usulanBangunan
     * @return \Illuminate\Http\Response
     */
    public function show(UsulanBangunan $usulanBangunan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsulanBangunan  $usulanBangunan
     * @return \Illuminate\Http\Response
     */
    public function edit(UsulanBangunan $usulanBangunan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsulanBangunanRequest  $request
     * @param  \App\Models\UsulanBangunan  $usulanBangunan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsulanBangunanRequest $request, UsulanBangunan $usulanBangunan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsulanBangunan  $usulanBangunan
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsulanBangunan $usulanBangunan)
    {
        //
    }
}
