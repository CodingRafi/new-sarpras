<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use App\Http\Requests\StoreRiwayatRequest;
use App\Http\Requests\UpdateRiwayatRequest;
use App\Models\Kompeten;
use App\Models\UsulanKoleksi;
use App\Models\UsulanFotos;
use App\Models\ProfilKcd;
use App\Models\Profil;
use App\Models\UsulanFoto;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_riwayats|add_riwayats|edit_riwayats|delete_riwayats', ['only' => ['index','show ']]);
         $this->middleware('permission:add_riwayats', ['only' => ['create','store']]);
         $this->middleware('permission:edit_riwayats', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_riwayats', ['only' => ['destroy']]);
         $this->middleware('permission:riwayats_show_dinas', ['only' => ['showDinas']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayats = Riwayat::where('profil_id', Auth::user()->profil_id)->get();
        $koleksi = UsulanKoleksi::koleksi($riwayats);
        $fotos = UsulanFoto::fotos($koleksi);
        return view('riwayatBantuan.index', [
            'kompils' => Kompeten::getKompeten(),
            'riwayats' => $riwayats,
            'fotos' => $fotos
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
     * @param  \App\Http\Requests\StoreRiwayatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRiwayatRequest $request)
    {
        $validatedData = $request->validate([
            'tahun_bantuan' => 'required',
            'jenis' => 'required',
            'pemberian_bantuan' => 'required',
            'sumber_anggaran' => 'required',
            'nilai_bantuan' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required',
            'gambar.*' => 'mimes:jpg,jpeg,png|file|max:5120'
        ]);

        $validatedData['profil_id'] = Auth::user()->profil_id;

        $riwayat = Riwayat::create($validatedData);

        $usulanKoleksi = UsulanKoleksi::create(['riwayat_id' => $riwayat->id]);
        UsulanFoto::uploadFotoRiwayat($request->gambar, $usulanKoleksi);

        Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menambahkan riwayat bantuan');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Riwayat  $riwayat
     * @return \Illuminate\Http\Response
     */
    public function show(Riwayat $riwayat, $id)
    {
        if (!Auth::user()->hasRole('sekolah')) {
            $riwayat = Riwayat::where('profil_id', $id)->get();

            $koleksi = UsulanKoleksi::koleksi($riwayat);
            $fotos = UsulanFoto::fotos($koleksi);

            return view('admin.detail-riwayat', [
                'riwayats' => $riwayat,
                'profil' => Profil::find($id),
                'fotos' => $fotos
            ]);
        }else{
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Riwayat  $riwayat
     * @return \Illuminate\Http\Response
     */
    public function edit(Riwayat $riwayat, $id)
    {
        $data = Riwayat::find($id);
        if($data->profil_id == Auth::user()->profil_id){
            return view('riwayatBantuan.edit', [
                'data' => $data,
                'fotos' => $data->UsulanKoleksi[0]->usulanFoto,
                'kompils' => Kompeten::getKompeten()
            ]);
        }else{
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRiwayatRequest  $request
     * @param  \App\Models\Riwayat  $riwayat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRiwayatRequest $request, Riwayat $riwayat, $id)
    {
        $data = Riwayat::find($id);
        if($data->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'tahun_bantuan' => 'required',
                'jenis' => 'required',
                'pemberian_bantuan' => 'required',
                'sumber_anggaran' => 'required',
                'nilai_bantuan' => 'required',
                'keterangan' => 'required',
                'gambar.*' => 'mimes:jpg,jpeg,png|file|max:5120'
            ]);

            if($request->file('gambar')){
                UsulanFoto::uploadFoto($request->gambar, $data->usulanKoleksi[0]);
            }

            $data->update($validatedData);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah riwayat bantuan');

            return redirect('/riwayat-bantuan');

        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Riwayat  $riwayat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Riwayat $riwayat, $id)
    {
        $data = Riwayat::find($id);
        if(Auth::user()->profil_id == $data->profil_id){
            $koleksi = $data->usulanKoleksi[0];
            $fotos = $koleksi->usulanFoto;
            UsulanFoto::deleteFoto($fotos);
            UsulanKoleksi::destroy($koleksi->id);
            Riwayat::destroy($data->id);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengahapus Riwayat Bantuan');

            return redirect()->back();
        }else{
            abort(403);
        }
    }

    public function showDinas(){
        if (!Auth::user()->hasRole('sekolah')) {
            if (Auth::user()->hasRole('kcd')) {
                $profils = ProfilKcd::get_data_for_kcd(Auth::user()->kcd_id);
                
            }else{
                $profils = Profil::search(request(['search', 'filter']))->paginate(40)->withQueryString();
                // dd($profils);
            }

            $sekolah = [];
            foreach ($profils as $key => $profil) {
                $sekolah[] = [
                    'id_profil' => $profil->id, 
                    'nama' => $profil->nama,
                    'npsn' => $profil->npsn,    
                    'status_sekolah' => $profil->status_sekolah,
                    'jml_riwayat' => Riwayat::get_sum_riwayat($profil)
                ];
            }

            return view('admin.riwayat', [
                'datas' =>$sekolah,
                'profils' => $profils
            ]);
        }else{
            abort(403);
        }
    }
}
