<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use App\Models\Kompeten;
use App\Models\UsulanBangunan;
use App\Models\UsulanKoleksi;
use App\Models\UsulanFoto;
use App\Models\Log;
use App\Models\JenisLaboratorium;
use App\Http\Requests\StoreLaboratoriumRequest;
use App\Http\Requests\UpdateLaboratoriumRequest;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;

class LaboratoriumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laboratorium = Laboratorium::select('laboratoria.*', 'jenis_laboratoria.jenis', 'laboratoria.id as id_lab')
                        ->where('laboratoria.profil_id', Auth::user()->profil_id)
                        ->leftJoin('jenis_laboratoria', 'jenis_laboratoria.id', 'laboratoria.jenis_laboratorium_id')
                        ->get();

        $usulans = UsulanBangunan::select('usulan_bangunans.*', 'jenis_laboratoria.jenis as nama_jenis_laboratorium')
                    ->where('usulan_bangunans.profil_id', Auth::user()->profil_id)
                    ->where('usulan_bangunans.jenis', 'laboratorium')
                    ->leftJoin('laboratoria', 'laboratoria.id', 'usulan_bangunans.laboratorium_id')
                    ->leftJoin('jenis_laboratoria', 'jenis_laboratoria.id', 'laboratoria.jenis_laboratorium_id')
                    ->get();
        $koleksi = UsulanKoleksi::koleksi($usulans);
        $fotos = UsulanFoto::fotos($koleksi);

        return view('lab.index', [
            'kompils' => Kompeten::getKompeten(),
            'jenis_laboratoriums' => JenisLaboratorium::belumTerpilih(),
            'laboratoriums' => $laboratorium,
            'usulans' => $usulans,
            'usulanFotos' => $fotos,
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
     * @param  \App\Http\Requests\StoreLaboratoriumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLaboratoriumRequest $request)
    {
        $validatedData = $request->validate([
            'jenis_laboratorium_id' => 'required',
            'kondisi_ideal' => 'required',
            'ketersediaan' => 'required',
            'kekurangan' => 'required'
        ]);

        $validatedData['profil_id'] = Auth::user()->profil_id;

        Laboratorium::create($validatedData);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laboratorium  $laboratorium
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratorium $laboratorium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laboratorium  $laboratorium
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratorium $laboratorium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLaboratoriumRequest  $request
     * @param  \App\Models\Laboratorium  $laboratorium
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLaboratoriumRequest $request, Laboratorium $laboratorium)
    {
        if ($laboratorium->profil_id == Auth::user()->profil_id) {
            $validatedData = $request->validate([
                'kondisi_ideal' => 'required',
                'ketersediaan' => 'required',
                'kekurangan' => 'required'
            ]);
    
            $laboratorium->update($validatedData);
    
            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laboratorium  $laboratorium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratorium $laboratorium)
    {
        if ($laboratorium->profil_id == Auth::user()->profil_id) {
            Laboratorium::destroy($laboratorium->id);
            
            return redirect()->back();
        }else{
            abort(403);
        }
    }

    public function createusulan(Request $request){
        $validatedData = $request->validate([
            'laboratorium_id' => 'required',
            'luas_lahan' => 'required',
            'gambar' => 'required',
            'proposal' => 'required|mimes:pdf',
            'gambar.*' => 'mimes:jpg,jpeg,png|file|max:5120'
        ]);

        $validatedData['jml_ruang'] = 1;
        $validatedData['keterangan'] = 'Proses Pengajuan';

        UsulanBangunan::createUsulan($request, 'laboratorium', $validatedData);

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambahkan usulan laboratorium');

        return redirect()->back()->with('success', 'Berhasil menambah usulan laboratorium!');
    }
}
