<?php

namespace App\Http\Controllers;

use App\Models\UsulanFoto;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUsulanFotoRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUsulanFotoRequest;
use App\Models\Kompeten;

class UsulanFotoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_usulan_foto|add_usulan_foto|edit_usulan_foto|delete_usulan_foto', ['only' => ['index','show ']]);
         $this->middleware('permission:add_usulan_foto', ['only' => ['create','store']]);
         $this->middleware('permission:edit_usulan_foto', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_usulan_foto', ['only' => ['destroy']]);
         $this->middleware('permission:foto_sigle_delete', ['only' => ['sigleDelete']]);
         $this->middleware('permission:foto_sigle_delete_rehab', ['only' => ['sigleDeleteRehab']]);
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
     * @param  \App\Http\Requests\StoreUsulanFotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsulanFotoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsulanFoto  $usulanFoto
     * @return \Illuminate\Http\Response
     */
    public function show(UsulanFoto $usulanFoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsulanFoto  $usulanFoto
     * @return \Illuminate\Http\Response
     */
    public function edit(UsulanFoto $usulanFoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsulanFotoRequest  $request
     * @param  \App\Models\UsulanFoto  $usulanFoto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsulanFotoRequest $request, UsulanFoto $usulanFoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsulanFoto  $usulanFoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsulanFoto $usulanFoto)
    {
        //
    }

    public function sigleDelete($id){
        $foto = UsulanFoto::find($id);
        if($foto->usulanKoleksi->usulanBangunan->profil_id == Auth::user()->profil_id){
            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menghapus 1 foto dari usulan bangunan ' . str_replace("_", ' ', $foto->usulanKoleksi->usulanBangunan->jenis));

            Storage::delete($foto->nama);
            UsulanFoto::destroy($foto->id);
            
            return response()->json(['status' => 'success']);
        }else{
            abort(403);
        }
    }

    public function sigleDeleteRehab($id){
        $foto = UsulanFoto::find($id);
        if($foto->usulanKoleksi->rehabRenov->profil_id == Auth::user()->profil_id){
            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menghapus 1 foto dari rehab/renov ' . str_replace("_", ' ', $foto->usulanKoleksi->rehabRenov->jenis));

            Storage::delete($foto->nama);
            UsulanFoto::destroy($foto->id);
            
            return response()->json(['status' => 'success']);
        }else{
            abort(403);
        }
    }
}
