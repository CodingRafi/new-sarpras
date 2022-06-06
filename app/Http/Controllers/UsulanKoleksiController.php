<?php

namespace App\Http\Controllers;

use App\Models\UsulanKoleksi;
use App\Http\Requests\StoreUsulanKoleksiRequest;
use App\Http\Requests\UpdateUsulanKoleksiRequest;
use App\Models\Kompeten;

class UsulanKoleksiController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_usulan_koleksi|add_usulan_koleksi|edit_usulan_koleksi|delete_usulan_koleksi', ['only' => ['index','show ']]);
         $this->middleware('permission:add_usulan_koleksi', ['only' => ['create','store']]);
         $this->middleware('permission:edit_usulan_koleksi', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_usulan_koleksi', ['only' => ['destroy']]);
    }

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
     * @param  \App\Http\Requests\StoreUsulanKoleksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsulanKoleksiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsulanKoleksi  $usulanKoleksi
     * @return \Illuminate\Http\Response
     */
    public function show(UsulanKoleksi $usulanKoleksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsulanKoleksi  $usulanKoleksi
     * @return \Illuminate\Http\Response
     */
    public function edit(UsulanKoleksi $usulanKoleksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsulanKoleksiRequest  $request
     * @param  \App\Models\UsulanKoleksi  $usulanKoleksi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsulanKoleksiRequest $request, UsulanKoleksi $usulanKoleksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsulanKoleksi  $usulanKoleksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsulanKoleksi $usulanKoleksi)
    {
        //
    }
}
