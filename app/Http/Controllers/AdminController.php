<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\UsulanLahan;
use App\Models\ProfilKcd;
use App\Models\UsulanBangunan;
use App\Models\UsulanPeralatan;
use Illuminate\Support\Facades\Auth;
use DB;

class AdminController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:view_profiladmin', ['only' => ['index','show']]);
        $this->middleware('permission:view_profil_search', ['only' => ['search']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('kcd')) {
            $profils = ProfilKcd::get_data_for_kcd(Auth::user()->kcd_id);
        }else{
            $profils = Profil::search(request(['search', 'filter']))
                                ->leftJoin('kota_kabupatens', 'kota_kabupatens.id', 'profils.kota_kabupaten_id')
                                ->leftJoin('profil_kcds', 'profil_kcds.kota_kabupaten_id', 'kota_kabupatens.id')
                                ->leftJoin('kcds', 'kcds.id', 'profil_kcds.kcd_id')
                                ->select('profils.*', 'kcds.instansi')->paginate(40)->withQueryString();
        }

        $datas = Profil::show_profil_admin($profils);

        return view('admin.dashboard',[
            'jml_usulan_lahan' => $datas[1],
            'jml_usulan_bangunan' => $datas[2],
            'jml_usulan_peralatan' => $datas[3],
            'datas' => $datas[0],
            'profils' => $profils
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
        if (Auth::user()->hasRole('kcd')) {
            $profils = ProfilKcd::get_data_for_kcd(Auth::user()->kcd_id);
        }else{
            $profils = Profil::search(request(['search']))->paginate(40);
        }

        return view('admin.index',[
            'profils' => $profils,
        ]);
    }

    
}
