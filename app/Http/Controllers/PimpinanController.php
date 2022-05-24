<?php

namespace App\Http\Controllers;

use App\Models\Pimpinan;
use App\Models\JenisPimpinan;
use App\Http\Requests\StorePimpinanRequest;
use App\Http\Requests\UpdatePimpinanRequest;
use App\Models\Log;
use App\Models\Kelas;
use App\Models\Bangunan;
use App\Models\UsulanBangunan;
use App\Models\UsulanKoleksi;
use App\Models\UsulanFoto;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PimpinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_pimpinan = JenisPimpinan::all();
        $pimpinan = Pimpinan::where('profil_id', Auth::user()->profil_id)->get();
        $usulans = UsulanBangunan::where('profil_id', Auth::user()->profil_id)->where('jenis', 'ruang_pimpinan')->get();
        $koleksi = UsulanKoleksi::koleksi($usulans);
        $fotos = UsulanFoto::fotos($koleksi);
        $jenisUsulanPimpinan = [];

        foreach($usulans as $usulan){
            $jenisUsulanPimpinan[] = $usulan->jenisPimpinan;
        }

        $data = [];
        foreach ($pimpinan as $key => $pim) {
            $data[] = [
                'id' => $pim->id,
                'id_jenis' => $pim->jenisPimpinan->id,
                'jenis' => $pim->jenisPimpinan->nama,
                'nama' => $pim->nama,
                'lebar' => $pim->lebar,
                'panjang' => $pim->panjang,
                'luas' => $pim->luas
            ];
        }

        return view("bangunan.pimpinan.index", [
            'jenis_pimpinans' => $jenis_pimpinan,
            'datas' => $data,
            'usulans' => $usulans,
            'usulanFotos' => $fotos,
            'usulanJenis' => $jenisUsulanPimpinan
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
     * @param  \App\Http\Requests\StorePimpinanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePimpinanRequest $request)
    {
        $validatedData = $request->validate([
            'jenis_pimpinan_id' => 'required',
            'nama' => 'required',
            'panjang' => 'required',
            'lebar' => 'required'
        ]);

        $validatedData['profil_id'] = Auth::user()->profil_id;
        $validatedData['luas'] = $request->panjang * $request->lebar;

        Pimpinan::create($validatedData);

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambah Ketersediaan Ruang Pimpinan');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pimpinan  $pimpinan
     * @return \Illuminate\Http\Response
     */
    public function show(Pimpinan $pimpinan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pimpinan  $pimpinan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pimpinan $pimpinan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePimpinanRequest  $request
     * @param  \App\Models\Pimpinan  $pimpinan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePimpinanRequest $request, Pimpinan $pimpinan)
    {
        $data = Pimpinan::find($request->id_pimpinan);
        
        if($data->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'id_pimpinan' => 'required',
                'jenis_pimpinan_id' => 'required',
                'nama' => 'required',
                'panjang' => 'required',
                'lebar' => 'required'
            ]);

            $validatedData['luas'] = $request->panjang * $request->lebar;
            $data->update($validatedData);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah data ketersediaan Ruang Pimpinan');

            return redirect()->back();

        }else{
            abort(403);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pimpinan  $pimpinan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pimpinan $pimpinan)
    {
        if($pimpinan->profil_id == Auth::user()->profil_id){
            Pimpinan::destroy($pimpinan->id);
            return redirect()->back();
        }else{
            abort(403);
        }
    }

    public function createusulan(Request $request){
        $validatedData = $request->validate([
            'jenis_pimpinan_id' => 'required',
            'luas_lahan' => 'required',
            'gambar' => 'required',
            'proposal' => 'required|mimes:pdf',
            'gambar.*' => 'mimes:jpg,jpeg,png|file|max:5120'
        ]);

        $validatedData['jml_ruang'] = 1;
        $validatedData['keterangan'] = 'Proses Pengajuan';

        UsulanBangunan::createUsulan($request, 'ruang_pimpinan', $validatedData);

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambahkan usulan ruang pimpinan');

        return redirect()->back();
    }

    public function showDinas(){
        $usulanBangunan = UsulanBangunan::search(request(['search']))
        ->leftJoin('profils', 'profils.id', '=', 'usulan_bangunans.profil_id')
        ->leftJoin('profil_kcds', 'profils.id', '=', 'profil_kcds.profil_id')
        ->leftJoin('kcds', 'profil_kcds.kcd_id', '=', 'kcds.id')->select('profils.*', 'kcds.instansi', 'usulan_bangunans.proposal', 'usulan_bangunans.id')->where('usulan_bangunans.jenis', 'ruang_pimpinan')->paginate(40)->withQueryString();

        return view('admin.toilet', [
            'usulanBangunans' => $usulanBangunan,
        ]);
    }
}
