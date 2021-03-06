<?php

namespace App\Http\Controllers\Lahan_sekolah;

use App\Models\KetersediaanLahan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKetersediaanLahanRequest;
use App\Http\Requests\UpdateKetersediaanLahanRequest;
use App\Models\Log;
use App\Models\Kompeten;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KetersediaanLahanController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_ketersediaan_lahan|add_ketersediaan_lahan|edit_ketersediaan_lahan|delete_ketersediaan_lahan', ['only' => ['index','show ']]);
         $this->middleware('permission:add_ketersediaan_lahan', ['only' => ['create','store']]);
         $this->middleware('permission:edit_ketersediaan_lahan', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_ketersediaan_lahan', ['only' => ['destroy']]);
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
     * @param  \App\Http\Requests\StoreKetersediaanLahanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKetersediaanLahanRequest $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_sertifikat' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'alamat' => 'required',
            'jenis_kepemilikan' => 'required',
            'keterangan' => 'required',
            'bukti_lahan' => 'required|mimes:jpg,jpeg,png,pdf|file|max:10240'
        ]);

        $validatedData['profil_id'] = Auth::user()->profil_id;
        $validatedData['luas'] = $request->panjang * $request->lebar;
        $validatedData['bukti_lahan'] = $request->file('bukti_lahan')->store('ketersedian-lahan');

        KetersediaanLahan::create($validatedData);

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambahkan Ketersediaan lahan');

        return redirect()->back()->with('success', 'Berhasil menyimpan ketersediaan lahan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KetersediaanLahan  $ketersediaanLahan
     * @return \Illuminate\Http\Response
     */
    public function show(KetersediaanLahan $ketersediaanLahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KetersediaanLahan  $ketersediaanLahan
     * @return \Illuminate\Http\Response
     */
    public function edit(KetersediaanLahan $ketersediaanLahan)
    {
        if($ketersediaanLahan->profil_id == Auth::user()->profil_id){
            return view('lahan.ketersediaan.edit', [
                'ketersediaan' => $ketersediaanLahan,
                'kompils' => Kompeten::getKompeten()
            ]);
        }else{
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKetersediaanLahanRequest  $request
     * @param  \App\Models\KetersediaanLahan  $ketersediaanLahan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKetersediaanLahanRequest $request, KetersediaanLahan $ketersediaanLahan)
    {
        if($ketersediaanLahan->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'nama' => 'required',
                'no_sertifikat' => 'required',
                'panjang' => 'required',
                'lebar' => 'required',
                'alamat' => 'required',
                'jenis_kepemilikan' => 'required',
                'keterangan' => 'required'
            ]);

            $validatedData['luas'] = $request->panjang * $request->lebar;
            if($request->file('bukti_lahan')){
                if($request->dokumenOld){
                    Storage::delete($request->dokumenOld);
                }
                $validatedData['bukti_lahan'] = $request->file('bukti_lahan')->store('bukti_lahan');
            }

            KetersediaanLahan::where('id', $ketersediaanLahan->id)->update($validatedData);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah Ketersediaan lahan ' . $request->nama);

            return redirect('/lahan')->with('success', 'Berhasil mengubah ketersediaan lahan!');
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KetersediaanLahan  $ketersediaanLahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(KetersediaanLahan $ketersediaanLahan)
    {
        if($ketersediaanLahan->profil_id == Auth::user()->profil_id){
            Storage::delete($ketersediaanLahan->bukti_lahan);
            KetersediaanLahan::destroy($ketersediaanLahan->id);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menghapus Ketersediaan lahan');

            return redirect()->back()->with('success', 'Berhasil menghapus ketersediaan lahan!');
        }else{
            abort(403);
        }
    }
}
