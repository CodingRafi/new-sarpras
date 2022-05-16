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

class KoleksiController extends Controller
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
    public function create($id)
    {
        return view('koleksi.create', [
            'profil_depo_id' => $id,
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
        $validatedData = $request->validate([
            'profil_depo_id' => 'required',
            'nama' => 'required',
            'jeniskoleksi_id' => 'required',
        ]);

        $validatedData['slug'] = SlugService::createSlug(Koleksi::class, 'slug', $request->nama);

        Koleksi::create($validatedData);

        Log::createLog($request->profil_depo_id, Auth::user()->id, 'Membuat Koleksi ' . $request->nama);

        return redirect('/foto/create/'.$validatedData['slug']);
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
            'koleksi' => $koleksi
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
        $validatedData = $request->validate([
            'profil_depo_id' => 'required',
            'slug' => 'required',
            'nama' => 'required',
        ]);

        Koleksi::where('slug', $request->slug)->update($validatedData);

        return redirect('profil/'.$koleksi->profil_depo_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Koleksi $koleksi)
    {
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
    }
}
