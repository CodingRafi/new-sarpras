<?php

namespace App\Http\Controllers;

use App\Models\JenisLaboratorium;
use App\Http\Requests\StoreJenisLaboratoriumRequest;
use App\Http\Requests\UpdateJenisLaboratoriumRequest;

class JenisLaboratoriumController extends Controller
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
     * @param  \App\Http\Requests\StoreJenisLaboratoriumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisLaboratoriumRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisLaboratorium  $jenisLaboratorium
     * @return \Illuminate\Http\Response
     */
    public function show(JenisLaboratorium $jenisLaboratorium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisLaboratorium  $jenisLaboratorium
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisLaboratorium $jenisLaboratorium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisLaboratoriumRequest  $request
     * @param  \App\Models\JenisLaboratorium  $jenisLaboratorium
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisLaboratoriumRequest $request, JenisLaboratorium $jenisLaboratorium)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisLaboratorium  $jenisLaboratorium
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisLaboratorium $jenisLaboratorium)
    {
        //
    }
}
