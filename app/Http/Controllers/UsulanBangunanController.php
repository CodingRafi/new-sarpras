<?php

namespace App\Http\Controllers;

use App\Models\UsulanBangunan;
use App\Models\Log;
use App\Models\UsulanKoleksi;
use App\Models\UsulanFoto;
use App\Models\JenisPimpinan;
use App\Models\Pimpinan;
use App\Models\laboratorium;
use ImageOptimizer;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUsulanBangunanRequest;
use App\Http\Requests\UpdateUsulanBangunanRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Kompeten;

class UsulanBangunanController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_usulan_bangunans|add_usulan_bangunans|edit_usulan_bangunans|delete_usulan_bangunans', ['only' => ['index','show ']]);
         $this->middleware('permission:add_usulan_bangunans', ['only' => ['create','store']]);
         $this->middleware('permission:edit_usulan_bangunans', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_usulan_bangunans', ['only' => ['destroy']]);
         $this->middleware('permission:usulan_bangunan_edit_pimpinan', ['only' => ['destroy']]);
         $this->middleware('permission:usulan_bangunan_update_pimpinan', ['only' => ['destroy']]);
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
     * @param  \App\Http\Requests\StoreUsulanBangunanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsulanBangunanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsulanBangunan  $usulanBangunan
     * @return \Illuminate\Http\Response
     */
    public function show(UsulanBangunan $usulanBangunan)
    {
        if($usulanBangunan->jenis == 'ruang_praktek'){
            return view('bangunan.show', [
                'data' => $usulanBangunan,
                'jurusan' => $usulanBangunan->kompeten->komli->kompetensi,
                'usulanFoto' => $usulanBangunan->usulanKoleksi[0]->usulanFoto,
                'profil' => $usulanBangunan->profil,
                'kompils' => Kompeten::getKompeten()
            ]);
        }else if($usulanBangunan->jenis == 'ruang_pimpinan'){
            return view('bangunan.show', [
                'data' => $usulanBangunan,
                'jenisPimpinan' => $usulanBangunan->jenisPimpinan->nama,
                'usulanFoto' => $usulanBangunan->usulanKoleksi[0]->usulanFoto,
                'profil' => $usulanBangunan->profil,
                'kompils' => Kompeten::getKompeten()
            ]);
        }elseif($usulanBangunan->jenis == 'laboratorium'){
            return view('bangunan.show', [
                'data' => $usulanBangunan,
                'jenisLaboratorium' => $usulanBangunan->laboratorium->jenis_laboratorium->jenis,
                'usulanFoto' => $usulanBangunan->usulanKoleksi[0]->usulanFoto,
                'profil' => $usulanBangunan->profil,
                'kompils' => Kompeten::getKompeten()
            ]);
        }

        return view('bangunan.show', [
            'data' => $usulanBangunan,
            'usulanFoto' => $usulanBangunan->usulanKoleksi[0]->usulanFoto,
            'profil' => $usulanBangunan->profil,
            'kompils' => Kompeten::getKompeten()
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsulanBangunan  $usulanBangunan
     * @return \Illuminate\Http\Response
     */
    public function edit(UsulanBangunan $usulanBangunan)
    {
        if($usulanBangunan->profil_id == Auth::user()->profil_id){
            return view('bangunan.edit', [
                'data' => $usulanBangunan,
                'fotos' => $usulanBangunan->UsulanKoleksi[0]->usulanFoto,
                'kompils' => Kompeten::getKompeten()
            ]);
        }else{
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsulanBangunanRequest  $request
     * @param  \App\Models\UsulanBangunan  $usulanBangunan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsulanBangunanRequest $request, UsulanBangunan $usulanBangunan)
    {
        if($usulanBangunan->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'jml_ruang' => 'required',
                'luas_lahan' => 'required'
            ]);
    
            if($request->file('gambar')){
                UsulanFoto::uploadFoto($request->gambar, $usulanBangunan->usulanKoleksi[0]);
            }
    
            if($request->file('proposal')){
                if($usulanBangunan->proposal){
                    Storage::delete($usulanBangunan->proposal);
                }
                $validatedData['proposal'] = $request->file('proposal')->store('proposal-usulan-bangunan');
            }
    
            UsulanBangunan::where('id', $usulanBangunan->id)
                ->update($validatedData);
    
            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah Usulan Bangunan ' . str_replace("_", " ", $usulanBangunan->jenis));

            return redirect('/bangunan?jenis=' . $usulanBangunan->jenis)->with('success','Berhasil mengubah usulan ' . str_replace("_", " ", $usulanBangunan->jenis) . '!');
            
        }else{
            abort(403);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsulanBangunan  $usulanBangunan
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsulanBangunan $usulanBangunan)
    {
        if($usulanBangunan->profil_id == Auth::user()->profil_id){
            UsulanBangunan::deleteUsulan($usulanBangunan);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Membatalkan Usulan bangunan ' . str_replace("_", " ", $usulanBangunan->jenis));

            return redirect()->back()->with('success','Berhasil membatalkan usulan ' . str_replace("_", " ", $usulanBangunan->jenis) . '!');
        }else{
            abort(403);
        }
    }

    public function editPimpinan(Request $request, $id){
        $data = UsulanBangunan::find($id);
        if($data->profil_id == Auth::user()->profil_id){
            if ($data->jenis == 'ruang_pimpinan') {
                $datadetail = UsulanBangunan::select('usulan_bangunans.*', 'pimpinans.*', 'jenis_pimpinans.nama', 'usulan_bangunans.id as id_usulan_bangunan')
                                            ->where('usulan_bangunans.id', $id)
                                            ->leftJoin('pimpinans', 'pimpinans.id', 'usulan_bangunans.pimpinan_id')
                                            ->leftJoin('jenis_pimpinans', 'jenis_pimpinans.id', 'pimpinans.jenis_pimpinan_id')
                                            ->get()->first();

                $jenis = Pimpinan::select('pimpinans.*', 'jenis_pimpinans.nama')
                        ->leftJoin('jenis_pimpinans', 'jenis_pimpinans.id', 'pimpinans.jenis_pimpinan_id')
                        ->where('profil_id', Auth::user()->profil_id)
                        ->get();
            }else if($data->jenis == 'laboratorium'){
                $datadetail = UsulanBangunan::select('usulan_bangunans.*', 'laboratoria.*', 'usulan_bangunans.id as id_usulan_bangunan', 'laboratoria.id as id_laboratorium')
                                            ->where('usulan_bangunans.id', $id)
                                            ->leftJoin('laboratoria', 'laboratoria.id', 'usulan_bangunans.laboratorium_id')
                                            ->get()->first();
                $jenis =  Laboratorium::select('laboratoria.*', 'jenis_laboratoria.jenis as nama_jenis_laboratorium', 'laboratoria.id as id_laboratorium')
                                            ->where('profil_id', Auth::user()->profil_id)
                                            ->leftJoin('jenis_laboratoria', 'jenis_laboratoria.id', 'laboratoria.jenis_laboratorium_id')->get();
            }else{
                $datadetail = UsulanBangunan::select('usulan_bangunans.*', 'kompetens.*', 'usulan_bangunans.id as id_usulan_bangunan')
                                            ->where('usulan_bangunans.id', $id)
                                            ->leftJoin('kompetens', 'kompetens.id', 'usulan_bangunans.kompeten_id')
                                            ->get()->first();
                $jenis = Kompeten::select('kompetens.*', 'komlis.kompetensi as nama_kompetensi', 'kompetens.id as id_kompeten')
                                            ->where('profil_id', Auth::user()->profil_id)
                                            ->leftJoin('komlis', 'kompetens.komli_id', 'komlis.id')->get();
            }

            return view('bangunan.editLebih', [
                'data' => $datadetail,
                'jenis' => $jenis,
                'fotos' => $data->UsulanKoleksi[0]->usulanFoto,
                'kompils' => Kompeten::getKompeten()
            ]);
        }else{
            abort(403);
        }
    }

    public function updatePimpinan(Request $request, $id)
    {
        $usulanBangunan = UsulanBangunan::find($id);
        if($usulanBangunan->profil_id == Auth::user()->profil_id){
            if ($usulanBangunan->jenis == 'ruang_pimpinan') {
                $validatedData = $request->validate([
                    'pimpinan_id' => 'required',
                    'luas_lahan' => 'required'
                ]);
            }elseif($usulanBangunan->jenis == 'laboratorium'){
                $validatedData = $request->validate([
                    'laboratorium_id' => 'required',
                    'luas_lahan' => 'required'
                ]);
            }else{
                $validatedData = $request->validate([
                    'kompeten_id' => 'required',
                    'luas_lahan' => 'required'
                ]);
            }
    
            if($request->file('gambar')){
                UsulanFoto::uploadFoto($request->gambar, $usulanBangunan->usulanKoleksi[0]);
            }
    
            if($request->file('proposal')){
                if($usulanBangunan->proposal){
                    Storage::delete($usulanBangunan->proposal);
                }
                $validatedData['proposal'] = $request->file('proposal')->store('proposal-usulan-bangunan');
            }
    
            UsulanBangunan::where('id', $usulanBangunan->id)
                ->update($validatedData);
    
            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah Usulan Bangunan ' . str_replace("_", " ", $usulanBangunan->jenis));

            if ($usulanBangunan->jenis == 'ruang_pimpinan') {
                if (request('home') == 'penunjang') {
                    return redirect('/bangunan/penunjang')->with('success', 'Berhasil mengubah usulan Ruang Penunjang!');
                }else{
                    return redirect('/bangunan/ruang-rehabrenov')->with('success', 'Berhasil mengubah usulan Ruang Penunjang!');
                }
            }elseif($usulanBangunan->jenis == 'laboratorium'){
                return redirect('/bangunan/laboratorium')->with('success', 'Berhasil mengubah usulan Laboratorium!');
            }else{
                return redirect('/bangunan/ruang-praktik')->with('success', 'Berhasil mengubah usulan Ruang Praktik!');
            }
        }else{
            abort(403);
        }

    }
}
