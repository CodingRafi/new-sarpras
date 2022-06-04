<?php

namespace App\Http\Controllers;

use App\Models\ProfilKcd;
use App\Http\Requests\StoreProfilKcdRequest;
use App\Http\Requests\UpdateProfilKcdRequest;
use App\Models\Kompeten;
use Illuminate\Support\Facades\Auth;

class ProfilKcdController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_profil_kcds|add_profil_kcds|edit_profil_kcds|delete_profil_kcds', ['only' => ['index','show ']]);
         $this->middleware('permission:add_profil_kcds', ['only' => ['create','store']]);
         $this->middleware('permission:edit_profil_kcds', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_profil_kcds', ['only' => ['destroy']]);
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
     * @param  \App\Http\Requests\StoreProfilKcdRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfilKcdRequest $request)
    {
        if (Auth::user()->hasRole('dinas')) {
            $validatedData = $request->validate([
                'id_kota_kabupaten' => 'required'
            ]);

            ProfilKcd::createProfilKcd($request->kcd_id, $request->id_kota_kabupaten);
    
            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfilKcd  $profilKcd
     * @return \Illuminate\Http\Response
     */
    public function show(ProfilKcd $profilKcd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfilKcd  $profilKcd
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfilKcd $profilKcd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfilKcdRequest  $request
     * @param  \App\Models\ProfilKcd  $profilKcd
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfilKcdRequest $request, ProfilKcd $profilKcd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfilKcd  $profilKcd
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfilKcd $profilKcd)
    {
        if (Auth::user()->hasRole('dinas')) {   
            ProfilKcd::destroy($profilKcd->id);
            return redirect()->back();
        }else{
            abort(403);
        }
    }
}
