<?php

namespace App\Http\Controllers\Bangunan\Ruang_kelas;

use App\Models\UsulanKelas;
use App\Models\Log;
use ImageOptimizer;
use Illuminate\Support\Facades\Auth;
use App\Models\UsulanKoleksi;
use App\Models\UsulanFoto;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsulanKelasRequest;
use App\Http\Requests\UpdateUsulanKelasRequest;
use Illuminate\Support\Facades\Storage;

class UsulanKelasController extends Controller
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
     * @param  \App\Http\Requests\StoreUsulanKelasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsulanKelasRequest $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'jml_ruang' => 'required',
            'luas_lahan' => 'required',
            'gambar' => 'required',
            'proposal' => 'required',
            'gambar.*' => 'mimes:jpg,jpeg,png|file|max:5120'
        ]);

        $validatedData['proposal'] = $request->file('proposal')->store('proposal-usulan-kelas');
        $validatedData['profil_id'] = Auth::user()->profil_id;
        $validatedData['jenis'] = 'Ruang Kelas';

        $usulanKelas = UsulanKelas::create($validatedData);
        $usulanKoleksi = UsulanKoleksi::create(['usulan_kelas_id' => $usulanKelas->id]);

        if($request->hasfile('gambar')){ // mengecek lagi bener bener ada gak isinya
            $files = [];
            foreach($request->gambar as $file){
                $nama = $file->store('fotoUsulan');
                ImageOptimizer::optimize('storage/' . $nama);
                UsulanFoto::create([
                    'usulan_koleksi_id' => $usulanKoleksi->id,
                    'nama' => $nama
                ]);
            }
        }

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambahkan usulan ruang kelas');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsulanKelas  $usulanKelas
     * @return \Illuminate\Http\Response
     */
    public function show(UsulanKelas $usulanKelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsulanKelas  $usulanKelas
     * @return \Illuminate\Http\Response
     */
    public function edit(UsulanKelas $usulanKelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsulanKelasRequest  $request
     * @param  \App\Models\UsulanKelas  $usulanKelas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsulanKelasRequest $request, UsulanKelas $usulanKelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsulanKelas  $usulanKelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsulanKelas $usulanKelas, $id)
    {
        $data = UsulanKelas::where('id', $id)->get()[0];
        if($data->profil_id == Auth::user()->profil_id){
            $koleksi = $data->usulanKoleksi[0];
            $fotos = $koleksi->usulanFoto;

            foreach ($fotos as $key => $foto) {
                Storage::delete($foto->nama);
                UsulanFoto::destroy($foto->id);
            }

            UsulanKoleksi::destroy($koleksi->id);
            
            Storage::delete($data->proposal);
            UsulanKelas::destroy($data->id);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Membatalkan Usulan Lahan');

            return redirect()->back();
        }else{
            abort(403);
        }
    }
}
