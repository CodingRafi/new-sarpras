<?php

namespace App\Http\Controllers;

use App\Models\RehabRenov;
use App\Models\UsulanKoleksi;
use App\Models\JenisPimpinan;
use App\Models\Pimpinan;
use App\Models\Bangunan;
use App\Models\ProfilKcd;
use App\Models\UsulanBangunan;
use App\Models\UsulanFoto;
use App\Http\Requests\StoreRehabRenovRequest;
use App\Http\Requests\UpdateRehabRenovRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Kompeten;

class RehabRenovController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_rehab_renov|add_rehab_renov|edit_rehab_renov|delete_rehab_renov', ['only' => ['index','show ']]);
         $this->middleware('permission:add_rehab_renov', ['only' => ['create','store']]);
         $this->middleware('permission:edit_rehab_renov', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_rehab_renov', ['only' => ['destroy']]);
         $this->middleware('permission:rehab_renov_create_usulan', ['only' => ['cretaeusulan']]);
         $this->middleware('permission:rehab_renov_show_dinas', ['only' => ['showDinas']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rehab = RehabRenov::where('profil_id', Auth::user()->profil_id)->get();
        $koleksi_rehab = UsulanKoleksi::koleksi($rehab);
        $fotos_rehab = UsulanFoto::fotos($koleksi_rehab);

        return view("bangunan.rehabrenov.index", [
            'rehabs' => $rehab,
            'usulanFotos_rehab' => $fotos_rehab,
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
     * @param  \App\Http\Requests\StoreRehabRenovRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRehabRenovRequest $request)
    {
        $validatedData = $request->validate([
            'jenis' => 'required',
            'persentase' => 'required',
            'usia' => 'required',
            'objek' => 'required',
            'luas_lahan' => 'required',
            'gambar' => 'required',
            'gambar.*' => 'mimes:jpg,jpeg,png|file|max:5120',
            'proposal' => 'required|file|max:5120',
            'keterangan' => 'required'
        ]);
        
        $validatedData['profil_id'] = Auth::user()->profil_id;
        $validatedData['proposal'] = $request->file('proposal')->store('proposal-usulan-bangunan');
        
        $rehab = RehabRenov::create($validatedData); 
        
        $usulanKoleksi = UsulanKoleksi::create(['rehab_renov_id' => $rehab->id]);
        UsulanFoto::uploadFoto($request->gambar, $usulanKoleksi);
        // dd($validatedData);

        return redirect()->back()->with('success', 'Berhasil menambah rencana rehab & renov!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RehabRenov  $rehabRenov
     * @return \Illuminate\Http\Response
     */
    public function show(RehabRenov $rehabRenov, $id)
    {
        $rehabRenov = RehabRenov::find($id);
        // dd($rehabRenov);
        return view('bangunan.rehabrenov.show', [
            'data' => $rehabRenov,
            'usulanFoto' => $rehabRenov->usulanKoleksi[0]->usulanFoto,
            'profil' => $rehabRenov->profil,
            'kompils' => Kompeten::getKompeten()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RehabRenov  $rehabRenov
     * @return \Illuminate\Http\Response
     */
    public function edit(RehabRenov $rehabRenov, $id)
    {
        $data = RehabRenov::find($id);
        if($data->profil_id == Auth::user()->profil_id){
            return view('bangunan.rehabrenov.edit', [
                'data' => $data,
                'fotos' => $data->usulanKoleksi[0]->usulanFoto,
                'kompils' => Kompeten::getKompeten()
            ]);
        }else{  
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRehabRenovRequest  $request
     * @param  \App\Models\RehabRenov  $rehabRenov
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRehabRenovRequest $request, RehabRenov $rehabRenov, $id)
    {
        $data = RehabRenov::find($id);
        if($data->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'jenis' => 'required',
                'persentase' => 'required',
                'usia' => 'required',
                'objek' => 'required',
                'luas_lahan' => 'required',
                'keterangan' => 'required'
            ]);

            if($request->file('gambar')){
                UsulanFoto::uploadFoto($request->gambar, $data->usulanKoleksi[0]);
            }

            if($request->file('proposal')){
                if($data->proposal){
                    Storage::delete($data->proposal);
                }
                $validatedData['proposal'] = $request->file('proposal')->store('proposal-usulan-bangunan');
            }
            
            $data->update($validatedData);

            return redirect('/bangunan/ruang-rehabrenov')->with('success', 'Berhasil mengubah rencana rehab & renov!');
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RehabRenov  $rehabRenov
     * @return \Illuminate\Http\Response
     */
    public function destroy(RehabRenov $rehabRenov, $id)
    {
        $data = RehabRenov::find($id);
        if($data->profil_id == Auth::user()->profil_id){
            if(count($data->usulanKoleksi) > 0){
                $koleksi = $data->usulanKoleksi[0];
                $fotos = $koleksi->usulanFoto;
                UsulanFoto::deleteFoto($fotos);
                UsulanKoleksi::destroy($koleksi->id);
            }
            Storage::delete($data->proposal);
            RehabRenov::destroy($data->id);

            return redirect()->back()->with('success', 'Berhasil membatalkan rencana rehab & renov!');
        }else{
            abort(403);
        }
    }

    public function showDinas(){
        if (Auth::user()->hasRole('kcd')) {
            $profils = ProfilKcd::ambil(Auth::user()->kcd_id);
            $usulanBangunan = [];
            foreach ($profils as $key => $profil) {
                $usulans = RehabRenov::where('profil_id', $profil->id)
                                ->leftJoin('profils', function($join) use ($profil){
                                    $join->where('profils.id', $profil->id);
                                })
                                ->leftJoin('kota_kabupatens', 'kota_kabupatens.id', 'profils.kota_kabupaten_id')
                                ->leftJoin('profil_kcds', 'kota_kabupatens.id', 'profil_kcds.kota_kabupaten_id')
                                ->leftJoin('kcds', 'kcds.id', 'profil_kcds.kcd_id')
                                ->select('profils.*', 'kcds.instansi', 'rehab_renovs.proposal', 'rehab_renovs.id')
                                ->get();
                if (count($usulans) > 0) {
                    foreach ($usulans as $usulan) {
                        $usulanBangunan[] = $usulan;
                    }
                }
            }
        }else{
            $usulanBangunan = RehabRenov::search(request(['search', 'filter']))
                            ->leftJoin('profils', 'profils.id', 'rehab_renovs.profil_id')
                            ->leftJoin('kota_kabupatens', 'kota_kabupatens.id', 'profils.kota_kabupaten_id')
                            ->leftJoin('profil_kcds', 'kota_kabupatens.id', 'profil_kcds.kota_kabupaten_id')
                            ->leftJoin('kcds', 'kcds.id', 'profil_kcds.kcd_id')
                            ->select('profils.*', 'kcds.instansi', 'rehab_renovs.proposal', 'rehab_renovs.id')
                            ->get();
        }

        return view('admin.ruangrehabrenov', [
            'usulanBangunans' => $usulanBangunan,
            'kompils' => Kompeten::getKompeten()
        ]);
    }
}
