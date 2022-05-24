<?php

namespace App\Http\Controllers\Lahan_sekolah;

use App\Http\Controllers\Controller;
use App\Models\UsulanLahan;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUsulanLahanRequest;
use App\Http\Requests\UpdateUsulanLahanRequest;
use Illuminate\Support\Facades\Storage;

class UsulanLahanController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:view_usulan_lahan|add_usulan_lahan|edit_usulan_lahan|delete_usulan_lahan', ['only' => ['index','show']]);
         $this->middleware('permission:add_usulan_lahan', ['only' => ['create','store']]);
         $this->middleware('permission:edit_usulan_lahan', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_usulan_lahan', ['only' => ['destroy']]);
    }   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semua_usulan = UsulanLahan::where('profil_id', Auth::user()->profil_id)->get();
        return view("lahan.usulan", [
            'semua_usulan' => $semua_usulan
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
     * @param  \App\Http\Requests\StoreUsulanLahanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsulanLahanRequest $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'alamat' => 'required',
            'proposal' => 'required|mimes:pdf|file|max:5120'
        ]);
        
        $validatedData['status'] = 'Proses Pengajuan';
        $validatedData['proposal'] = $request->file('proposal')->store('proposal-lahan');
        $validatedData['jenis_usulan'] = 'lahan';
        $validatedData['luas'] = $request->panjang * $request->lebar;
        $validatedData['profil_id'] = Auth::user()->profil_id;

        UsulanLahan::create($validatedData);

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Membuat Usulan Lahan');

        return redirect()->back();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsulanLahan  $usulanLahan
     * @return \Illuminate\Http\Response
     */
    public function show(UsulanLahan $usulanLahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsulanLahan  $usulanLahan
     * @return \Illuminate\Http\Response
     */
    public function edit(UsulanLahan $usulanLahan)
    {
        return view('lahan.edit', [
            'data' => $usulanLahan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsulanLahanRequest  $request
     * @param  \App\Models\UsulanLahan  $usulanLahan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsulanLahanRequest $request, UsulanLahan $usulanLahan)
    {
        if($usulanLahan->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'nama' => 'required',
                'panjang' => 'required',
                'lebar' => 'required',
                'alamat' => 'required'
            ]);

            if($request->file('proposal')){
                if($usulanLahan->proposal){
                    Storage::delete($usulanLahan->proposal);
                }
                $validatedData['proposal'] = $request->file('proposal')->store('proposal-usulan-bangunan');
            }

            UsulanLahan::where('id', $usulanLahan->id)
                        ->update($validatedData);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah Usulan Lahan');

            return redirect('/usulan-lahan');

        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsulanLahan  $usulanLahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsulanLahan $usulanLahan)
    {
        if($usulanLahan->profil_id == Auth::user()->profil_id){
            Storage::delete($usulanLahan->proposal);
            UsulanLahan::destroy($usulanLahan->id);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Membatalkan usulan');

            return redirect()->back();
        }else{
            abort(403);
        }

        
    }
}
