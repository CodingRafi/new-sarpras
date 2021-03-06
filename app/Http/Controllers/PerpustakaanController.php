<?php

namespace App\Http\Controllers;

use App\Models\Perpustakaan;
use App\Models\Log;
use App\Models\Bangunan;
use App\Models\Kompeten;
use App\Models\Profil;
use App\Models\UsulanKoleksi;
use App\Models\UsulanFoto;
use App\Models\UsulanBangunan;
use App\Http\Requests\StorePerpustakaanRequest;
use App\Http\Requests\UpdatePerpustakaanRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_perpustakaan|add_perpustakaan|edit_perpustakaan|delete_perpustakaan', ['only' => ['index','show ']]);
         $this->middleware('permission:add_perpustakaan', ['only' => ['create','store']]);
         $this->middleware('permission:edit_perpustakaan', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_perpustakaan', ['only' => ['destroy']]);
         $this->middleware('permission:perpustakaan_create_usulan', ['only' => ['createusulan']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usulans = UsulanBangunan::where('profil_id', Auth::user()->profil_id)->where('jenis', 'perpustakaan')->get();
        $koleksi = UsulanKoleksi::koleksi($usulans);
        $fotos = UsulanFoto::fotos($koleksi);
        $data = Bangunan::where('profil_id', Auth::user()->profil_id)->where('jenis', 'perpustakaan')->get()[0];
        $profil = Profil::where('id', Auth::user()->profil_id)->get()[0];

        $jml_lk = 0;
        $jml_pr = 0;

        $kompetens = Kompeten::where('profil_id', Auth::user()->profil_id)->get();
        foreach ($kompetens as $key => $kompeten) {
            $jml_lk += $kompeten->jml_lk;
            $jml_pr += $kompeten->jml_pr;
        }

        return view("bangunan.perpustakaan.index",[
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
     * @param  \App\Http\Requests\StorePerpustakaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePerpustakaanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perpustakaan  $perpustakaan
     * @return \Illuminate\Http\Response
     */
    public function show(Perpustakaan $perpustakaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perpustakaan  $perpustakaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perpustakaan $perpustakaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePerpustakaanRequest  $request
     * @param  \App\Models\Perpustakaan  $perpustakaan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerpustakaanRequest $request, Perpustakaan $perpustakaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perpustakaan  $perpustakaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perpustakaan $perpustakaan)
    {
        //
    }

    public function createusulan(Request $request){
        $validatedData = $request->validate([
            'luas_lahan' => 'required',
            'gambar' => 'required',
            'proposal' => 'required|mimes:pdf',
            'gambar.*' => 'mimes:jpg,jpeg,png|file|max:5120'
        ]);

        $validatedData['jml_ruang'] = 1;
        $validatedData['keterangan'] = 'Proses Pengajuan';

        UsulanBangunan::createUsulan($request, 'perpustakaan', $validatedData);

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambahkan usulan bangunan perpustakaan');

        return redirect()->back()->with('success', 'Berhasil menambah usulan perpustakaan');
    }

    public function showDinas(){
        $usulanBangunan = UsulanBangunan::search(request(['search']))
        ->leftJoin('profils', 'profils.id', '=', 'usulan_bangunans.profil_id')
        ->leftJoin('profil_kcds', 'profils.id', '=', 'profil_kcds.profil_id')
        ->leftJoin('kcds', 'profil_kcds.kcd_id', '=', 'kcds.id')->select('profils.*', 'kcds.instansi', 'usulan_bangunans.proposal', 'usulan_bangunans.id')->where('usulan_bangunans.jenis', 'perpustakaan')->paginate(40)->withQueryString();

        return view('admin.ruangperpustakaan', [
            'usulanBangunans' => $usulanBangunan,
            'kompils' => Kompeten::getKompeten()
        ]);
    }
}
