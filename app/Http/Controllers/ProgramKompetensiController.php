<?php

namespace App\Http\Controllers;

use App\Models\ProgramKompetensi;
use App\Http\Requests\StoreProgramKompetensiRequest;
use App\Http\Requests\UpdateProgramKompetensiRequest;

class ProgramKompetensiController extends Controller
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
     * @param  \App\Http\Requests\StoreProgramKompetensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgramKompetensiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProgramKompetensi  $programKompetensi
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramKompetensi $programKompetensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgramKompetensi  $programKompetensi
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramKompetensi $programKompetensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProgramKompetensiRequest  $request
     * @param  \App\Models\ProgramKompetensi  $programKompetensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProgramKompetensiRequest $request, ProgramKompetensi $programKompetensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgramKompetensi  $programKompetensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramKompetensi $programKompetensi)
    {
        //
    }
}
