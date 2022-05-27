<?php

namespace App\Http\Controllers;

use App\Models\PeralatanTersedia;
use App\Models\Peralatan;
use App\Models\Kompeten;
use App\Models\Komli;
use App\Models\Log;
use App\Http\Requests\StorePeralatanTersediaRequest;
use App\Http\Requests\UpdatePeralatanTersediaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PeralatanTersediaController extends Controller
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
     * @param  \App\Http\Requests\StorePeralatanTersediaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeralatanTersediaRequest $request)
    {
        if($request->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'profil_id' => 'required',
                'nama' => 'required',
                'kategori' => 'required',
                'katersediaan' => 'required',
                'kekurangan' => 'required'
            ]);
            
            if ($validatedData['kekurangan'] < 1 && $validatedData['katersediaan'] > 0) {
                $validatedData['status'] = 'ideal';
            }else{
                $validatedData['status'] = 'kekurangan';
            }
            $validatedData['kompeten_id'] = $request->kompeten_id;;
    
            $logJurusan = Komli::Join('kompetens', 'komlis.id', 'kompetens.komli_id')
                ->Join('peralatan_tersedias','kompetens.id','peralatan_tersedias.kompeten_id')
                ->where('peralatan_tersedias.kompeten_id', $validatedData['kompeten_id'])
                ->pluck('kompetensi')
                ->first();

            PeralatanTersedia::create($validatedData);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambahkan Ketersediaan Peralatan '.$logJurusan);
    
            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PeralatanTersedia  $peralatanTersedia
     * @return \Illuminate\Http\Response
     */
    public function show(PeralatanTersedia $peralatanTersedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeralatanTersedia  $peralatanTersedia
     * @return \Illuminate\Http\Response
     */
    public function edit(PeralatanTersedia $peralatan_tersedium)
    {
        // return($peralatan_tersedium);
        if($peralatan_tersedium->profil_id == Auth::user()->profil_id){
            $kompeten = $peralatan_tersedium->Kompeten->komli_id;
            $peralatans = Peralatan::where('komli_id', $kompeten)->select('peralatans.*', 'komlis.kompetensi')->leftJoin('komlis', 'peralatans.komli_id', 'komlis.id')->paginate(15);

            return view('peralatan-sekolah.edit',[
                'peraturans' => $peralatans,
                'kompils' => Kompeten::getKompeten(),
                'data' => $peralatan_tersedium
            ]);
        }else{
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeralatanTersediaRequest  $request
     * @param  \App\Models\PeralatanTersedia  $peralatanTersedia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeralatanTersediaRequest $request, PeralatanTersedia $peralatan_tersedium)
    {
        if($peralatan_tersedium->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'nama' => 'required',
                'kategori' => 'required',
                'katersediaan' => 'required',
                'kekurangan' => 'required'
            ]);
            
            if ($validatedData['kekurangan'] < 1 && $validatedData['katersediaan'] > 0) {
                $validatedData['status'] = 'ideal';
            }else{
                $validatedData['status'] = 'kekurangan';
            }
            $validatedData['kompeten_id'] = $request->kompeten_id;
            $validatedData['profil_id'] = Auth::user()->profil_id;

            $logJurusan = Komli::Join('kompetens', 'komlis.id', 'kompetens.komli_id')
                ->Join('peralatan_tersedias','kompetens.id','peralatan_tersedias.kompeten_id')
                ->where('peralatan_tersedias.kompeten_id', $validatedData['kompeten_id'])
                ->pluck('kompetensi')
                ->first();

            PeralatanTersedia::where('id', $peralatan_tersedium->id)
                ->update($validatedData);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah Ketersediaan Peralatan '.$logJurusan);

            return redirect('/peralatan-sekolah/'.$peralatan_tersedium->kompeten_id);
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeralatanTersedia  $peralatanTersedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeralatanTersedia $peralatan_tersedium)
    {
        if($peralatan_tersedium->profil_id == Auth::user()->profil_id){
            $logJurusan = Komli::Join('kompetens', 'komlis.id', 'kompetens.komli_id')
            ->Join('peralatan_tersedias','kompetens.id','peralatan_tersedias.kompeten_id')
            ->where('peralatan_tersedias.kompeten_id', $peralatan_tersedium->kompeten_id)
            ->pluck('kompetensi')
            ->first();
            
            PeralatanTersedia::deletePeralatan($peralatan_tersedium);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menghapus Ketersediaan Peralatan '.$logJurusan);

            return redirect()->back();
        }else{
            abort(403);
        }
    }
}
