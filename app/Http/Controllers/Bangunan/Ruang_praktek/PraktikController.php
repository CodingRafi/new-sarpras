<?php

namespace App\Http\Controllers\Bangunan\Ruang_praktek;

use App\Models\Log;
use ImageOptimizer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Praktik;
use App\Models\Kompeten;
use App\Models\Komli;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePraktikRequest;
use App\Http\Requests\UpdatePraktikRequest;

class PraktikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kompetens = Kompeten::where('profil_id', Auth::user()->profil_id)->get();

        $komli = [];
        foreach($kompetens as $kompeten){
            $komli[] = $kompeten->komli;
        }

        return view("bangunan.praktik.index", [
            'komlis' => $komli
        ]);
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
     * @param  \App\Http\Requests\StorePraktikRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePraktikRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Praktik  $praktik
     * @return \Illuminate\Http\Response
     */
    public function show(Praktik $praktik)
    {
        return view("bangunan.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Praktik  $praktik
     * @return \Illuminate\Http\Response
     */
    public function edit(Praktik $praktik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePraktikRequest  $request
     * @param  \App\Models\Praktik  $praktik
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePraktikRequest $request, Praktik $praktik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Praktik  $praktik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Praktik $praktik)
    {
        //
    }
}
