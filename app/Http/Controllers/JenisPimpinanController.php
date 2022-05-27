<?php

namespace App\Http\Controllers;

use App\Models\JenisPimpinan;
use App\Http\Requests\StoreJenisPimpinanRequest;
use App\Http\Requests\UpdateJenisPimpinanRequest;
use App\Models\Kompeten;

class JenisPimpinanController extends Controller
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
     * @param  \App\Http\Requests\StoreJenisPimpinanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisPimpinanRequest $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required'
        ]);

        JenisPimpinan::create($validatedData);
        
        //! belum buat log
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisPimpinan  $jenisPimpinan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisPimpinan $jenisPimpinan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisPimpinan  $jenisPimpinan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisPimpinan $jenisPimpinan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisPimpinanRequest  $request
     * @param  \App\Models\JenisPimpinan  $jenisPimpinan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisPimpinanRequest $request, JenisPimpinan $jenisPimpinan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisPimpinan  $jenisPimpinan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisPimpinan $jenisPimpinan)
    {
        //
    }
}
