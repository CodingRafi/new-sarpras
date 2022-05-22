<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\UsulanLahan;
use App\Models\UsulanBangunan;

class AdminController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:view_profiladmin', ['only' => ['index','show',]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usulanLahan = UsulanLahan::all();
        $usulanBangunan = UsulanBangunan::all();
        $usulanPeralatan = 0;

        return view('admin.dashboard',[
            'jml_usulan_lahan' => count($usulanLahan),
            'jml_usulan_bangunan' => count($usulanBangunan),
            'jml_usulan_peralatan' => $usulanPeralatan
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(){
        return view('admin.index',[
            'profils' => Profil::search(request(['search']))->paginate(40),
        ]);
    }

    public function lahanDinas(){
        return view('admin.lahan');
    }
}
