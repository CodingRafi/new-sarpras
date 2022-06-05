<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use App\Models\Foto;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreKoleksiRequest;
use App\Http\Requests\UpdateKoleksiRequest;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Kompeten;

class KoleksiController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_koleksis|add_koleksis|edit_koleksis|delete_koleksis', ['only' => ['index','show ']]);
         $this->middleware('permission:add_koleksis', ['only' => ['create','store']]);
         $this->middleware('permission:edit_koleksis', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_koleksis', ['only' => ['destroy']]);
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
    public function create($id)
    {
        return view('koleksi.create', [
            'profil_depo_id' => $id,
            'kompils' => Kompeten::getKompeten()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKoleksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKoleksiRequest $request)
    {
        if($request->profil_depo_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'profil_depo_id' => 'required',
                'nama' => 'required',
                'jeniskoleksi_id' => 'required',
            ]);
    
            $validatedData['slug'] = SlugService::createSlug(Koleksi::class, 'slug', $request->nama);
    
            Koleksi::create($validatedData);
    
            Log::createLog($request->profil_depo_id, Auth::user()->id, 'Membuat Koleksi ' . $request->nama);
    
            return redirect('/foto/create/'.$validatedData['slug']);
        }else{
            abort(403);
        }
        // return redirect('/profil/'.$request->profil_depo_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function show(Koleksi $koleksi)
    {
        return view('koleksi.show', [
            'koleksi' => $koleksi,
            'fotos' => $koleksi->foto,
            'kompils' => Kompeten::getKompeten()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Koleksi $koleksi)
    {
        return view('koleksi.edit', [
            'koleksi' => $koleksi,
            'kompils' => Kompeten::getKompeten()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKoleksiRequest  $request
     * @param  \App\Models\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKoleksiRequest $request, Koleksi $koleksi)
    {
        if($request->profil_depo_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'profil_depo_id' => 'required',
                'slug' => 'required',
                'nama' => 'required',
            ]);
    
            Koleksi::where('slug', $request->slug)->update($validatedData);
    
            return redirect('profil/'.$koleksi->profil_depo_id);
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Koleksi $koleksi)
    {
        if($koleksi->profil_depo_id == Auth::user()->profil_id){
            $fotos = $koleksi->foto;
    
            if(count($fotos) > 0){
                foreach($fotos as $foto){
                    Storage::delete($foto->filename);
                    Foto::destroy($foto->id);
                }
            }
    
            Koleksi::destroy($koleksi->id);
    
            $logs = Log::create([
                'profil_id' => $koleksi->profil_depo_id,
                'users_id' => Auth::user()->id,
                'keterangan' => 'Menghapus Koleksi ' . $koleksi->nama
            ]);
    
            return redirect('profil/'.$koleksi->profil_depo_id);
        }else{
            abort(403);
        }
    }
}
