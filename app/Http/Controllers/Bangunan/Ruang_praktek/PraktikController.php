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
use DB;

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

        $kompetenPraktekTersedia = Praktik::ambilKompeten(Auth::user()->profil_id);
        $komliPraktekTersedia = Komli::ambilKomli($kompetenPraktekTersedia);

        $data = [];
        $praktiks = Praktik::where('profil_id', Auth::user()->profil_id )->get();

        foreach($praktiks as $ke => $praktik){
            $data[] = [
                'id' => $praktik->id,
                'kompeten_id' => $praktik->kompeten_id,
                'jml_ruang' => $praktik->jml_ruang,
                'status' => $praktik->status,
                'jml_ideal' => Kompeten::where('id', $praktik->kompeten_id)->get()[0]->kondisi_ideal,
                'keterangan' => $praktik->keterangan,
                'jurusan' => Kompeten::where('id', $praktik->kompeten_id)->get()[0]->komli->kompetensi
            ];
        }

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
            'usulanFotos' => $fotos,
            'kompetenPraktekTersedias' => $kompetenPraktekTersedia,
            'komliPraktekTersedias' => $komliPraktekTersedia,
            'datas' => $data
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
        $validatedData = $request->validate([
            'kompeten_id' => 'required',
            'jml_ruang' => 'required'
        ]);
        
        $validatedData['status'] = 'ideal';
        $validatedData['jml_ideal'] = '16';
        $validatedData['keterangan'] = 'sudah cukup';
        $validatedData['profil_id'] = Auth::user()->profil_id;

        $kompeten = Kompeten::where('id', $request->kompeten_id)->get()[0]->komli;

        Praktik::create($validatedData);

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambahkan Ketersedian ruang praktek' . $kompeten->kompetensi);

        return redirect()->back();

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
        $data = Praktik::where('id', $request->id_praktik)->get()[0];
        if($data->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'jml_ruang' => 'required'
            ]);

            $data->update($validatedData);

            $kompeten = Kompeten::where('id', $data->kompeten_id)->get()[0]->komli->kompetensi;

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Merubah Jumlah Ketersediaan Ruang Praktek ' . $kompeten);

            return redirect()->back();

        }else{  
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Praktik  $praktik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Praktik $praktik, $id)
    {
        $data = Praktik::where('id', $id)->get()[0];
        if($data->profil_id == Auth::user()->profil_id){
            Praktik::destroy($data->id);
            $kompeten = Kompeten::where('id', $data->kompeten_id)->get()[0]->komli->kompetensi;
            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menghapus Ketersediaan Ruang Praktek ' . $kompeten);
            return redirect()->back();
        }else{
            abort(403);
        }
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
        $validatedData['keterangan'] = "Proses Pengajuan";

        UsulanBangunan::createUsulan($request, 'ruang_praktek', $validatedData);

        $kompeten = Kompeten::where('id', $request->kompeten_id)->get()[0]->komli->kompetensi;

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambahkan usulan ruang praktek' . $kompeten);

        return redirect()->back();
    }

    public function showDinas(){
        $usulanBangunan = UsulanBangunan::where('jenis', 'ruang_praktek')->paginate(40);
        $datas = [];
        foreach ($usulanBangunan as $key => $usulan) {
            $datas[] = $usulan->profil;
        }

        $kcds = [];
        foreach ($datas as $key => $data) {
            $kcds[] = $data->profilKcd[0]->kcd;
        }

        return view('admin.ruangkelas', [
            'usulanBangunans' => $usulanBangunan,
            'profils' => $datas,
            'kcds' => $kcds
        ]);
    }
}
