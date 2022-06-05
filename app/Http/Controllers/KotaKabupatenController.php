<?php

namespace App\Http\Controllers;

use App\Models\KotaKabupaten;
use App\Http\Requests\StoreKotaKabupatenRequest;
use App\Http\Requests\UpdateKotaKabupatenRequest;

class KotaKabupatenController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_kota_kabupatens|add_kota_kabupatens|edit_kota_kabupatens|delete_kota_kabupatens', ['only' => ['index','show ']]);
         $this->middleware('permission:add_kota_kabupatens', ['only' => ['create','store']]);
         $this->middleware('permission:edit_kota_kabupatens', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_kota_kabupatens', ['only' => ['destroy']]);
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
     * @param  \App\Http\Requests\StoreKotaKabupatenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKotaKabupatenRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KotaKabupaten  $kotaKabupaten
     * @return \Illuminate\Http\Response
     */
    public function show(KotaKabupaten $kotaKabupaten)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KotaKabupaten  $kotaKabupaten
     * @return \Illuminate\Http\Response
     */
    public function edit(KotaKabupaten $kotaKabupaten)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKotaKabupatenRequest  $request
     * @param  \App\Models\KotaKabupaten  $kotaKabupaten
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKotaKabupatenRequest $request, KotaKabupaten $kotaKabupaten)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KotaKabupaten  $kotaKabupaten
     * @return \Illuminate\Http\Response
     */
    public function destroy(KotaKabupaten $kotaKabupaten)
    {
        //
    }
}
