<?php

namespace App\Http\Controllers\Bangunan\Ruang_praktek;

use App\Models\Log;
use ImageOptimizer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Praktik;
use App\Models\Kompeten;
use App\Models\UsulanBangunan;
use App\Models\UsulanKoleksi;
use App\Models\UsulanFoto;
use App\Models\Komli;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePraktikRequest;
use App\Http\Requests\UpdatePraktikRequest;
use Illuminate\Http\Request;

class PraktikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kompetens = Kompeten::where('profil_id', Auth::user()->profil_id)->get();
        $usulanPraktek = UsulanBangunan::where('profil_id', Auth::user()->profil_id)->where('jenis', 'ruang_praktek')->get();
        $koleksi = UsulanKoleksi::koleksi($usulanPraktek);
        $fotos = UsulanFoto::fotos($koleksi);

        $komliUsulan = [];

        foreach ($usulanPraktek as $key => $usulan) {
            $komliUsulan[] = $usulan->kompeten->komli;
        }

        $komli = [];
        foreach($kompetens as $kompeten){
            $komli[] = $kompeten->komli;
        }

        return view("bangunan.praktik.index", [
            'komlis' => $komli,
            'usulanPraktek' => $usulanPraktek,
            'kompetens' => $kompetens,
            'komliUsulan' => $komliUsulan,
            'usulanFotos' => $fotos
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
     * @param  \App\Http\Requests\StorePraktikRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePraktikRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Praktik  $praktik
     * @return \Illuminate\Http\Response
     */
    public function show(Praktik $praktik)
    {
        return view("bangunan.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Praktik  $praktik
     * @return \Illuminate\Http\Response
     */
    public function edit(Praktik $praktik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePraktikRequest  $request
     * @param  \App\Models\Praktik  $praktik
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePraktikRequest $request, Praktik $praktik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Praktik  $praktik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Praktik $praktik)
    {
        //
    }

    public function createusulan(Request $request){
        $validatedData = $request->validate([
            'jml_ruang' => 'required',
            'luas_lahan' => 'required',
            'gambar' => 'required',
            'proposal' => 'required|mimes:pdf',
            'gambar.*' => 'mimes:jpg,jpeg,png|file|max:5120',
            'kompeten_id' => 'required'
        ]);

        $validatedData['kompeten_id'] = $request->kompeten_id;

        UsulanBangunan::createUsulan($request, 'ruang_praktek', $validatedData);

        $kompeten = Kompeten::where('id', $request->kompeten_id)->get()[0]->komli->kompetensi;

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambahkan usulan ruang praktek' . $kompeten);

        return redirect()->back();
    }

    public function deleteusulan(Request $request, $id){
        $data = UsulanBangunan::where('id', $id)->get()[0];
        if($data->profil_id == Auth::user()->profil_id){
            $kompeten = Kompeten::where('id', $data->kompeten_id)->get()[0]->komli->kompetensi;

            UsulanBangunan::deleteUsulan($data);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Membatalkan Usulan ruang praktek' . $kompeten);

            return redirect()->back();
        }else{
            abort(403);
        }
    }
}
