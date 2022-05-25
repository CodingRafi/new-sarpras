<?php

namespace App\Http\Controllers;

use App\Models\RehabRenov;
use App\Models\UsulanKoleksi;
use App\Models\JenisPimpinan;
use App\Models\Pimpinan;
use App\Models\UsulanBangunan;
use App\Models\UsulanFoto;
use App\Http\Requests\StoreRehabRenovRequest;
use App\Http\Requests\UpdateRehabRenovRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Kompeten;

class RehabRenovController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rehab = RehabRenov::where('profil_id', Auth::user()->profil_id)->get();
        $koleksi = UsulanKoleksi::koleksi($rehab);
        $fotos = UsulanFoto::fotos($koleksi);

        $jenis_pimpinan = JenisPimpinan::all();
        $pimpinan = Pimpinan::where('profil_id', Auth::user()->profil_id)->get();
        $usulans = UsulanBangunan::where('profil_id', Auth::user()->profil_id)->where('jenis', 'ruang_pimpinan')->get();
        $koleksi = UsulanKoleksi::koleksi($usulans);
        $fotos = UsulanFoto::fotos($koleksi);
        $jenisUsulanPimpinan = [];

        foreach($usulans as $usulan){
            $jenisUsulanPimpinan[] = $usulan->jenisPimpinan;
        }

        $data = [];
        foreach ($pimpinan as $key => $pim) {
            $data[] = [
                'id' => $pim->id,
                'id_jenis' => $pim->jenisPimpinan->id,
                'jenis' => $pim->jenisPimpinan->nama,
                'nama' => $pim->nama,
                'lebar' => $pim->lebar,
                'panjang' => $pim->panjang,
                'luas' => $pim->luas
            ];
        }

        return view("bangunan.rehabrenov.index", [
            'rehabs' => $rehab,
            'usulanKoleksis' => $koleksi,
            'usulanFotos' => $fotos,
            'jenis_pimpinans' => $jenis_pimpinan,
            'datas' => $data,
            'usulans' => $usulans,
            'usulanFotos' => $fotos,
            'usulanJenis' => $jenisUsulanPimpinan,
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

        return redirect()->back();
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

            return redirect('/bangunan/ruang-rehabrenov');
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

            return redirect()->back();
        }else{
            abort(403);
        }
    }

    public function showDinas(){
        $usulanBangunan = RehabRenov::search(request(['search']))
        ->leftJoin('profils', 'profils.id', '=', 'rehab_renovs.profil_id')
        ->leftJoin('profil_kcds', 'profils.id', '=', 'profil_kcds.profil_id')
        ->leftJoin('kcds', 'profil_kcds.kcd_id', '=', 'kcds.id')->select('profils.*', 'kcds.instansi', 'rehab_renovs.proposal', 'rehab_renovs.id')->paginate(40)->withQueryString();

        return view('admin.ruangrehabrenov', [
            'usulanBangunans' => $usulanBangunan,
            'kompils' => Kompeten::getKompeten()
        ]);
    }
}
