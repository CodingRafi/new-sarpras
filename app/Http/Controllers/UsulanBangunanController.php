<?php

namespace App\Http\Controllers;

use App\Models\UsulanBangunan;
use App\Models\Log;
use App\Models\UsulanKoleksi;
use App\Models\UsulanFoto;
use App\Models\JenisPimpinan;
use ImageOptimizer;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUsulanBangunanRequest;
use App\Http\Requests\UpdateUsulanBangunanRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UsulanBangunanController extends Controller
{
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
        return view('bangunan.show', [
            'data' => $usulanBangunan,
            'profil' => $usulanBangunan->profil
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
                'fotos' => $usulanBangunan->UsulanKoleksi[0]->usulanFoto
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

            if($usulanBangunan->jenis == 'perpustakaan'){
                return redirect('/bangunan/ruang-perpustakaan');
            }else{
                return redirect('/bangunan/' . str_replace("_", "-", $usulanBangunan->jenis));
            }
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

            return redirect()->back();
        }else{
            abort(403);
        }
    }

    public function editPimpinan(Request $request, $id){
        $data = UsulanBangunan::find($id);
        if($data->profil_id == Auth::user()->profil_id){
            $jenis_pimpinan = JenisPimpinan::all();
            return view('bangunan.editPimpinan', [
                'data' => $data,
                'fotos' => $data->UsulanKoleksi[0]->usulanFoto,
                'jenis' => $data->jenisPimpinan,
                'jenis_pimpinans' => $jenis_pimpinan,
            ]);
        }else{
            abort(403);
        }
    }

    public function updatePimpinan(Request $request, $id)
    {
        $usulanBangunan = UsulanBangunan::find($id);
        if($usulanBangunan->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'jenis_pimpinan_id' => 'required',
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

            return redirect('/bangunan/pimpinan');
        }else{
            abort(403);
        }

    }
}
