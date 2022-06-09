<?php

namespace App\Http\Controllers;

use App\Models\JenisLaboratoriumKomlis;
use App\Http\Requests\StoreJenisLaboratoriumKomlisRequest;
use App\Http\Requests\UpdateJenisLaboratoriumKomlisRequest;
use Illuminate\Http\Request;

class JenisLaboratoriumKomlisController extends Controller
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
     * @param  \App\Http\Requests\StoreJenisLaboratoriumKomlisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisLaboratoriumKomlisRequest $request)
    {
        $validatedData = $request->validate([
            'jenis_laboratorium_id' => 'required',
            'komlis' => 'required'
        ]);

        foreach ($request->komlis as $key => $komli) {
            JenisLaboratoriumKomlis::create([
                'jenis_laboratorium_id' => $request->jenis_laboratorium_id,
                'komli_id' => $komli
            ]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisLaboratoriumKomlis  $jenisLaboratoriumKomlis
     * @return \Illuminate\Http\Response
     */
    public function show(JenisLaboratoriumKomlis $jenisLaboratoriumKomlis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisLaboratoriumKomlis  $jenisLaboratoriumKomlis
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisLaboratoriumKomlis $jenisLaboratoriumKomlis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisLaboratoriumKomlisRequest  $request
     * @param  \App\Models\JenisLaboratoriumKomlis  $jenisLaboratoriumKomlis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisLaboratoriumKomlisRequest $request, JenisLaboratoriumKomlis $jenisLaboratoriumKomlis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisLaboratoriumKomlis  $jenisLaboratoriumKomlis
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisLaboratoriumKomlis $jenisLaboratoriumKomlis, Request $request)
    {
        if (Auth::user()->hasRole('dinas')) {
            $validatedData = $request->validate([
                'id_jenis_laboratorium_komlis' => 'required'
            ]);
            foreach ($request->id_jenis_laboratorium_komlis as $key => $id_jenis) {
                JenisLaboratoriumKomlis::destroy($id_jenis);
            }
    
            return redirect()->back();
        }else{
            abort(403);
        }
    }
}
