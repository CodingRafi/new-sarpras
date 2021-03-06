<?php

namespace App\Http\Controllers;

use App\Models\Toilet;
use App\Models\Perpustakaan;
use App\Models\Log;
use App\Models\Bangunan;
use App\Models\Kompeten;
use App\Models\Profil;
use App\Models\UsulanKoleksi;
use App\Models\UsulanFoto;
use App\Models\UsulanBangunan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreToiletRequest;
use App\Http\Requests\UpdateToiletRequest;

class ToiletController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_toilet|add_toilet|edit_toilet|delete_toilet', ['only' => ['index','show ']]);
         $this->middleware('permission:add_toilet', ['only' => ['create','store']]);
         $this->middleware('permission:edit_toilet', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_toilet', ['only' => ['destroy']]);
         $this->middleware('permission:toilet_create_usulan', ['only' => ['createusulan']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usulans = UsulanBangunan::where('profil_id', Auth::user()->profil_id)->where('jenis', 'toilet')->get();
        $koleksi = UsulanKoleksi::koleksi($usulans);
        $fotos = UsulanFoto::fotos($koleksi);
        $data = Bangunan::where('profil_id', Auth::user()->profil_id)->where('jenis', 'toilet')->get()[0];
        $profil = Profil::where('id', Auth::user()->profil_id)->get()[0];

        $jml_lk = 0;
        $jml_pr = 0;

        $kompetens = Kompeten::where('profil_id', Auth::user()->profil_id)->get();
        foreach ($kompetens as $key => $kompeten) {
            $jml_lk += $kompeten->jml_lk;
            $jml_pr += $kompeten->jml_pr;
        }

        return view("bangunan.toilet.index",[
            'usulans' => $usulans,
            'usulanFotos' => $fotos,
            'data' => $data,
            'profil' => $profil,
            'jml_siswa' => $jml_lk + $jml_pr,
            'kompils' => Kompeten::getKompeten()
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
     * @param  \App\Http\Requests\StoreToiletRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreToiletRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Toilet  $toilet
     * @return \Illuminate\Http\Response
     */
    public function show(Toilet $toilet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Toilet  $toilet
     * @return \Illuminate\Http\Response
     */
    public function edit(Toilet $toilet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateToiletRequest  $request
     * @param  \App\Models\Toilet  $toilet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateToiletRequest $request, Toilet $toilet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Toilet  $toilet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toilet $toilet)
    {
        //
    }

    public function createusulan(Request $request){
        $validatedData = $request->validate([
            'luas_lahan' => 'required',
            'gambar' => 'required',
            'proposal' => 'required|mimes:pdf',
            'jml_ruang' => 'required',
            'gambar.*' => 'mimes:jpg,jpeg,png|file|max:5120'
        ]);

        $validatedData['keterangan'] = 'Proses Pengajuan';

        UsulanBangunan::createUsulan($request, 'toilet', $validatedData);

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambahkan usulan bangunan toilet');

        return redirect()->back()->with('success', 'Berhasil menambah usulan toilet!');
    }

    // public function showDinas(){
    //     $usulanBangunan = UsulanBangunan::search(request(['search']))
    //     ->leftJoin('profils', 'profils.id', '=', 'usulan_bangunans.profil_id')
    //     ->leftJoin('profil_kcds', 'profils.id', '=', 'profil_kcds.profil_id')
    //     ->leftJoin('kcds', 'profil_kcds.kcd_id', '=', 'kcds.id')->select('profils.*', 'kcds.instansi', 'usulan_bangunans.proposal', 'usulan_bangunans.id')->where('usulan_bangunans.jenis', 'toilet')->paginate(40)->withQueryString();

    //     return view('admin.toilet', [
    //         'usulanBangunans' => $usulanBangunan,
    //         'kompils' => Kompeten::getKompeten()
    //     ]);
    // }
}
