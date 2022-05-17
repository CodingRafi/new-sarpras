<?php

namespace App\Http\Controllers\Lahan_sekolah;

use App\Models\Log;
use App\Models\KekuranganLahan;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKekuranganLahanRequest;
use App\Http\Requests\UpdateKekuranganLahanRequest;

class KekuranganLahanController extends Controller
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
     * @param  \App\Http\Requests\StoreKekuranganLahanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKekuranganLahanRequest $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'lebar' => 'required',
            'panjang' => 'required'
        ]);

        $validatedData['luas'] = $request->panjang * $request->lebar;
        $validatedData['profil_id'] = Auth::user()->profil_id;

        KekuranganLahan::create($validatedData);

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambahkan Kekurangan Lahan');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KekuranganLahan  $kekuranganLahan
     * @return \Illuminate\Http\Response
     */
    public function show(KekuranganLahan $kekuranganLahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KekuranganLahan  $kekuranganLahan
     * @return \Illuminate\Http\Response
     */
    public function edit(KekuranganLahan $kekuranganLahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKekuranganLahanRequest  $request
     * @param  \App\Models\KekuranganLahan  $kekuranganLahan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKekuranganLahanRequest $request, KekuranganLahan $kekuranganLahan)
    {
        $data = KekuranganLahan::where('id', $request->id_kekurangan)->get()[0];
        if($data->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'nama' => 'required',
                'panjang' => 'required',
                'lebar' => 'required'
            ]);

            $validatedData['luas'] = $request->panjang * $request->lebar;

            KekuranganLahan::where('id', $data->id)->update($validatedData);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah Kekurangan Lahan');

            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KekuranganLahan  $kekuranganLahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(KekuranganLahan $kekuranganLahan)
    {
        if($kekuranganLahan->profil_id == Auth::user()->profil_id){
            KekuranganLahan::destroy($kekuranganLahan->id);
            return redirect()->back();
        }else{
            abort(403);
        }
    }
}
