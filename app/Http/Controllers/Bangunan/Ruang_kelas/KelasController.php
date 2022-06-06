<?php

namespace App\Http\Controllers\Bangunan\Ruang_kelas;

use App\Models\Kelas;
use App\Models\Bangunan;
use App\Models\UsulanKelas;
use App\Models\UsulanBangunan;
use App\Models\UsulanKoleksi;
use App\Models\UsulanFoto;
use App\Models\Profil;
use App\Models\Kompeten;
use App\Models\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_kelas|add_kelas|edit_kelas|delete_kelas', ['only' => ['index','show ']]);
         $this->middleware('permission:add_kelas', ['only' => ['create','store']]);
         $this->middleware('permission:edit_kelas', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_kelas', ['only' => ['destroy']]);
         $this->middleware('permission:kelas_create_usulan', ['only' => ['createusulan']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usulanKelas = UsulanBangunan::where('profil_id', Auth::user()->profil_id)->where('jenis', 'ruang_kelas')->get();
        $koleksi = UsulanKoleksi::koleksi($usulanKelas);
        $fotos = UsulanFoto::fotos($koleksi);
        $data = Bangunan::where('profil_id', Auth::user()->profil_id)->where('jenis', 'ruang_kelas')->get()[0];
        $profil = Profil::where('id', Auth::user()->profil_id)->get()[0];

        return view("bangunan.kelas.index",[
            'usulanKelas' => $usulanKelas,
            'usulanFotos' => $fotos,
            'dataKelas' => $data,
            'profil' => $profil,
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
     * @param  \App\Http\Requests\StoreKelasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKelasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKelasRequest  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKelasRequest $request, Kelas $kelas)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        //
    }


    public function createusulan(Request $request){
        $validatedData = $request->validate([
            'jml_ruang' => 'required',
            'luas_lahan' => 'required',
            'gambar' => 'required',
            'proposal' => 'required|mimes:pdf',
            'gambar.*' => 'mimes:jpg,jpeg,png|file|max:5120'
        ]);

        $validatedData['keterangan'] = 'Proses Pengajuan';

        UsulanBangunan::createUsulan($request, 'ruang_kelas', $validatedData);

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambahkan usulan bangunan kelas');

        return redirect()->back()->with('success','Berhasil menambah usulan ruang kelas!');
    }

    // public function showDinas(){
    //     $usulanBangunan = UsulanBangunan::search(request(['search']))
    //                     ->leftJoin('profils', 'profils.id', '=', 'usulan_bangunans.profil_id')
    //                     ->leftJoin('profil_kcds', 'profils.id', '=', 'profil_kcds.profil_id')
    //                     ->leftJoin('kcds', 'profil_kcds.kcd_id', '=', 'kcds.id')->select('profils.*', 'kcds.instansi', 'usulan_bangunans.proposal', 'usulan_bangunans.id')->where('usulan_bangunans.jenis', 'ruang_kelas')->paginate(40)->withQueryString();

    //     return view('admin.ruangkelas', [
    //         'usulanBangunans' => $usulanBangunan,
    //         'kompils' => Kompeten::getKompeten()
    //     ]);
    // }

}
