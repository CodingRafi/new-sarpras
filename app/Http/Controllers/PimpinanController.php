<?php

namespace App\Http\Controllers;

use App\Models\Pimpinan;
use App\Models\JenisPimpinan;
use App\Http\Requests\StorePimpinanRequest;
use App\Http\Requests\UpdatePimpinanRequest;
use App\Models\Log;
use App\Models\Kelas;
use App\Models\Bangunan;
use App\Models\UsulanBangunan;
use App\Models\UsulanKoleksi;
use App\Models\UsulanFoto;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kompeten;


class PimpinanController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_pimpinan|add_pimpinan|edit_pimpinan|delete_pimpinan', ['only' => ['index','show ']]);
         $this->middleware('permission:add_pimpinan', ['only' => ['create','store']]);
         $this->middleware('permission:edit_pimpinan', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_pimpinan', ['only' => ['destroy']]);
         $this->middleware('permission:pimpinan_create_usulan', ['only' => ['cretaeusulan']]);
         $this->middleware('permission:pimpinan_show_dinas', ['only' => ['showDinas']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pimpinan = Pimpinan::select('pimpinans.*', 'jenis_pimpinans.*', 'pimpinans.id as id_pimpinan' , 'jenis_pimpinans.id as id_jenis_pimpinan')
                            ->leftJoin('jenis_pimpinans', 'jenis_pimpinans.id', 'pimpinans.jenis_pimpinan_id')
                            ->where('profil_id', Auth::user()->profil_id)->get();
        $usulans = UsulanBangunan::select('usulan_bangunans.*', 'jenis_pimpinans.nama')
                                    ->leftJoin('pimpinans', 'pimpinans.id', 'usulan_bangunans.pimpinan_id')
                                    ->leftJoin('jenis_pimpinans', 'jenis_pimpinans.id', 'pimpinans.jenis_pimpinan_id')
                                    ->where('usulan_bangunans.profil_id', Auth::user()->profil_id)
                                    ->where('usulan_bangunans.jenis', 'ruang_penunjang')->get();
                                    
        $koleksi = UsulanKoleksi::koleksi($usulans);
        $fotos = UsulanFoto::fotos($koleksi);

        return view("bangunan.pimpinan.index", [
            'jenis_pimpinans' => JenisPimpinan::belumTerpilih(),
            'datas' => $pimpinan,
            'usulans' => $usulans,
            'usulanFotos' => $fotos,
            'kompils' => Kompeten::getKompeten(),
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
     * @param  \App\Http\Requests\StorePimpinanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePimpinanRequest $request)
    {
        $validatedData = $request->validate([
            'jenis_pimpinan_id' => 'required',
            'kondisi_ideal' => 'required',
            'ketersediaan' => 'required',
            'kekurangan' => 'required',
            'keterangan' => 'required'
        ]);

        $validatedData['profil_id'] = Auth::user()->profil_id;

        Pimpinan::create($validatedData);

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambah Jenis Ruang Penunjang' . JenisPimpinan::find($request->jenis_pimpinan_id)->nama);

        return redirect()->back()->with('success', 'Berhasil menambah Jenis Ruang Penunjang ' .  JenisPimpinan::find($request->jenis_pimpinan_id)->nama);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pimpinan  $pimpinan
     * @return \Illuminate\Http\Response
     */
    public function show(Pimpinan $pimpinan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pimpinan  $pimpinan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pimpinan $pimpinan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePimpinanRequest  $request
     * @param  \App\Models\Pimpinan  $pimpinan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePimpinanRequest $request, Pimpinan $pimpinan, $id)
    {
        $data = Pimpinan::find($id);
        
        if($data->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'kondisi_ideal' => 'required',
                'ketersediaan' => 'required',
                'kekurangan' => 'required',
                'keterangan' => 'required'
            ]);

            $data->update($validatedData);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah data ketersediaan Ruang Pimpinan');

            return redirect()->back()->with('success', 'Berhasil mengubah ketersediaan ruang pimpinan!');

        }else{
            abort(403);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pimpinan  $pimpinan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pimpinan $pimpinan, $id)
    {
        $pimpinan = Pimpinan::find($id);
        if($pimpinan->profil_id == Auth::user()->profil_id){
            Pimpinan::destroy($pimpinan->id);
            return redirect()->back()->with('success', 'Berhasil menghapus ketersediaan ruang pimpinan!');
        }else{
            abort(403);
        }
    }

    public function createusulan(Request $request){
        $validatedData = $request->validate([
            'pimpinan_id' => 'required',
            'luas_lahan' => 'required',
            'gambar' => 'required',
            'proposal' => 'required|mimes:pdf',
            'gambar.*' => 'mimes:jpg,jpeg,png|file|max:5120'
        ]);
        
        $validatedData['jml_ruang'] = 1;
        $validatedData['keterangan'] = 'Proses Pengajuan';
        
        UsulanBangunan::createUsulan($request, 'ruang_penunjang', $validatedData);

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambahkan usulan ruang penunjang');

        return redirect()->back()->with('success', 'Berhasil menambah usulan ruang penunjang!');
    }

    public function showDinas(){
        $usulanBangunan = UsulanBangunan::search(request(['search']))
        ->leftJoin('profils', 'profils.id', '=', 'usulan_bangunans.profil_id')
        ->leftJoin('profil_kcds', 'profils.id', '=', 'profil_kcds.profil_id')
        ->leftJoin('kcds', 'profil_kcds.kcd_id', '=', 'kcds.id')->select('profils.*', 'kcds.instansi', 'usulan_bangunans.proposal', 'usulan_bangunans.id')->where('usulan_bangunans.jenis', 'ruang_penunjang')->paginate(40)->withQueryString();
        
        return view('admin.ruangpimpinan', [
            'usulanBangunans' => $usulanBangunan,
            'kompils' => Kompeten::getKompeten()
        ]);
    }
}
