<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\UsulanLahan;
use App\Models\UsulanBangunan;
use DB;

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
        $datas = [];
        DB::enableQueryLog();
        $profils = Profil::search(request(['search', 'filter']))
                            ->leftJoin('kota_kabupatens', 'kota_kabupatens.id', 'profils.kota_kabupaten_id')
                            ->leftJoin('profil_kcds', 'profil_kcds.kota_kabupaten_id', 'kota_kabupatens.id')
                            ->leftJoin('kcds', 'kcds.id', 'profil_kcds.kcd_id')
                            ->select('profils.*', 'kcds.instansi')->paginate(40)->withQueryString();
                            // dd(DB::getQueryLog());

        // dd($profils[0]);
        // $profils = Profil::filter(request(['filter']))->select('*')->paginate(40)->withQueryString();

        foreach ($profils as $key => $profil) {
            $datas[] = [
                'id' => $profil->id,
                'profil_depo_id' => $profil->profil_depo_id,
                'npsn' => $profil->npsn,
                'sekolah_id' => $profil->sekolah_id,
                'nama' => $profil->nama,
                'status_sekolah' => $profil->status_sekolah,
                'alamat' => $profil->alamat,
                'provinsi' => $profil->provinsi,
                'kabupaten' => $profil->kabupaten,
                'kecamatan' => $profil->kecamatan,
                'email' => $profil->email,
                'website' => $profil->website,
                'nomor_telepon' => $profil->nomor_telepon,
                'nomor_fax' => $profil->nomor_fax,
                'akreditas' => $profil->akreditas,
                'jml_siswa_l' => $profil->jml_siswa_l,
                'jml_siswa_p' => $profil->jml_siswa_p,
                'usulanLahan' => $profil->usulanLahan,
                'usulanBangunan' => $profil->usulanBangunan,
                'instansi' => $profil->instansi,
                'rehab' => $profil->rehab
            ];
        }

        // dd($datas[0]);

        return view('admin.dashboard',[
            'jml_usulan_lahan' => count($usulanLahan),
            'jml_usulan_bangunan' => count($usulanBangunan),
            'jml_usulan_peralatan' => $usulanPeralatan,
            'datas' => $datas,
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
        return view('admin.index',[
            'profils' => Profil::search(request(['search']))->paginate(40),
        ]);
    }

    
}
