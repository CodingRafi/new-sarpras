<?php

namespace App\Http\Controllers;

use App\Models\UnsurVerifikasi;
use App\Http\Requests\StoreUnsurVerifikasiRequest;
use App\Http\Requests\UpdateUnsurVerifikasiRequest;
use Illuminate\Support\Facades\Auth;

class UnsurVerifikasiController extends Controller
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
     * @param  \App\Http\Requests\StoreUnsurVerifikasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnsurVerifikasiRequest $request)
    {
        if(Auth::user()->hasRole('dinas')){
            $validatedData = $request->validate([
                'unsur' => 'required'
            ]);

            UnsurVerifikasi::create($validatedData);

            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnsurVerifikasi  $unsurVerifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(UnsurVerifikasi $unsurVerifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnsurVerifikasi  $unsurVerifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(UnsurVerifikasi $unsurVerifikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnsurVerifikasiRequest  $request
     * @param  \App\Models\UnsurVerifikasi  $unsurVerifikasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnsurVerifikasiRequest $request, UnsurVerifikasi $unsurVerifikasi)
    {
        if(Auth::user()->hasRole('dinas')){
            $validatedData = $request->validate([
                'unsur' => 'required'
            ]);

            $unsurVerifikasi->update($validatedData);

            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnsurVerifikasi  $unsurVerifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnsurVerifikasi $unsurVerifikasi)
    {
        if(Auth::user()->hasRole('dinas')){
            UnsurVerifikasi::destroy($unsurVerifikasi->id);
        }else{  
            abort(403);
        }
    }
}
