<?php

namespace App\Http\Controllers;

use App\Models\Monev;
use App\Models\User;
use App\Http\Requests\StoreMonevRequest;
use App\Http\Requests\UpdateMonevRequest;;
use App\Models\Kompeten;
use App\Models\KotaKabupaten;
use App\Models\UnsurVerifikasi;

class MonevController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unsurVerifikasis = UnsurVerifikasi::all();
        $kotaKabupaten = KotaKabupaten::all();
        $users = User::whereNotNull('instansi')->select('users.*', 'kota_kabupatens.nama as nama_kota_kabupaten', 'kota_kabupatens.id as id_kota_kabupatens')->leftJoin('kota_kabupatens', 'users.kota_kabupaten_id', 'kota_kabupatens.id')->get();
        $pengawas = [];
        $verifikator = [];

        foreach ($users as $key => $user) {
            if($user->hasRole('pengawas')){
                $pengawas[] = $user;
            }else if($user->hasRole('verifikator')){
                $verifikator[] = $user;
            }
        }

        return view("admin.monitoring", [
            'unsurs' => $unsurVerifikasis,
            'pengawases' => $pengawas,
            'verifikators' => $verifikator,
            'kota_kabupatens' => $kotaKabupaten
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
     * @param  \App\Http\Requests\StoreMonevRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMonevRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monev  $monev
     * @return \Illuminate\Http\Response
     */
    public function show(Monev $monev)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monev  $monev
     * @return \Illuminate\Http\Response
     */
    public function edit(Monev $monev)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMonevRequest  $request
     * @param  \App\Models\Monev  $monev
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMonevRequest $request, Monev $monev)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monev  $monev
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monev $monev)
    {
        //
    }
}
