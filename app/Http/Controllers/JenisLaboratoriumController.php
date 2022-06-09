<?php

namespace App\Http\Controllers;

use App\Models\JenisLaboratorium;
use App\Models\JenisLaboratoriumKomlis;
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
        $validatedData = $request->validate([
            'jenis' => 'required',
            'komli_id' => 'required'
        ]);

        $jenis = JenisLaboratorium::create($validatedData);

        foreach ($request->komli_id as $key => $komli_id) {
            JenisLaboratoriumKomlis::create([
                'jenis_laboratorium_id' => $jenis->id,
                'komli_id' => $komli_id
            ]);
        }

        return redirect()->back();

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
        foreach ($jenisLaboratorium->jenislaboratoriumkomli as $key => $jenis_komli) {
            JenisLaboratoriumKomlis::destroy($jenis_komli->id);
        }
        JenisLaboratorium::destroy($jenisLaboratorium->id);
        return redirect()->back();
    }
}
