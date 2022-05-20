<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use App\Models\Profil;
use App\Models\Kelas;
use App\Models\Log;
use App\Http\Requests\StoreBangunanRequest;
use App\Http\Requests\UpdateBangunanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BangunanController extends Controller
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
     * @param  \App\Http\Requests\StoreBangunanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBangunanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bangunan  $bangunan
     * @return \Illuminate\Http\Response
     */
    public function show(Bangunan $bangunan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bangunan  $bangunan
     * @return \Illuminate\Http\Response
     */
    public function edit(Bangunan $bangunan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBangunanRequest  $request
     * @param  \App\Models\Bangunan  $bangunan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBangunanRequest $request, Bangunan $bangunan,$id)
    {
        $data = Bangunan::where('id', $id)->get()[0];
        dd($data);
        if($data->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'ketersediaan' => 'numeric',
                'kekurangan' => 'numeric',
            ]);

            $data->update($validatedData);

            $ketersediaan = Kelas::where('profil_id', Auth::user()->profil_id)->get()[0]->ketersediaan;
            $jml_rombel = Profil::where('id', Auth::user()->profil_id)->get()[0]->jml_rombel;

            Kelas::kondisi_ideal($jml_rombel, $ketersediaan);

            if($request->ketersediaan != ''){
                Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah jumlah ketersediaan ruang kelas');
            }else{
                Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah jumlah kekurangan ruang kelas');
            }

            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bangunan  $bangunan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bangunan $bangunan)
    {
        //
    }

    public function ubahKetersediaan(Request $request, $id){
        $data = Bangunan::where('id', $id)->get()[0];
        if($data->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'ketersediaan' => 'required|numeric',
            ]);

            $data->update($validatedData);

            if($data->jenis == 'ruang_kelas'){
                $ketersediaan = Bangunan::where('id', $id)->get()[0]->ketersediaan;
                $jml_rombel = Profil::where('id', Auth::user()->profil_id)->get()[0]->jml_rombel;
                Bangunan::kondisi_ideal($jml_rombel, $ketersediaan);
            }

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah jumlah ketersediaan ' . str_replace("_", " ", $data->jenis));

            return redirect()->back();
        }else{
            abort(403);
        }
    }

}
