<?php

namespace App\Http\Controllers;

use App\Models\Log;
use ImageOptimizer;
use App\Models\Foto;
use App\Models\Koleksi;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFotoRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateFotoRequest;
use App\Models\Kompeten;

class FotoController extends Controller
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
    public function create($slug)
    {
        $data = Koleksi::where('slug', $slug)->get()[0];
        return view('foto.create',[
            'koleksi_id' => $data->id,
            'koleksi' => $data,
            'jeniskoleksi' => $data->jeniskoleksi,
            'kompils' => Kompeten::getKompeten()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFotoRequest $request)
    {
        $validatedData = $request->validate([
            'koleksi_id' => 'required',
            'nama' => 'required',
            'nama.*' => 'mimes:jpg,jpeg,png|file|max:5120'
        ]);

        $koleksi = Koleksi::where('id', $request->koleksi_id)->get()[0];

        if($request->hasfile('nama')){ // mengecek lagi bener bener ada gak isinya
            $files = [];
            foreach($request->nama as $file){
                $nama = $file->store('imgUploads');
                ImageOptimizer::optimize('storage/' . $nama);
                Foto::create([
                    'koleksi_id' => $validatedData['koleksi_id'],
                    'filename' => $nama
                ]);
            }
        }

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambahkan ' . count($request->nama) . ' foto');

        return redirect('/koleksi/' . $koleksi->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto $foto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFotoRequest  $request
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFotoRequest $request, Foto $foto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foto $foto)
    {
        $koleksi = Koleksi::where('id', $foto->koleksi_id)->get()[0];
        Storage::delete($foto->filename);
        Foto::destroy($foto->id);

        Log::createLog($koleksi->profil_depo_id, Auth::user()->id, 'Menghapus 1 foto dari koleksi' . $koleksi->nama);

        return redirect()->back();
    }
}
