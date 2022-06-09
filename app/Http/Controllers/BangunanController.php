<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use App\Models\Profil;
use App\Models\Komli;
use App\Models\Kelas;
use App\Models\Log;
use App\Models\UsulanBangunan;
use App\Models\JenisPimpinan;
use App\Models\JenisLaboratorium;
use App\Models\JenisLaboratoriumKomlis;
use App\Models\UsulanKoleksi;
use App\Models\UsulanFoto;
use App\Http\Requests\StoreBangunanRequest;
use App\Http\Requests\UpdateBangunanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kompeten;
use App\Models\ProfilKcd;
use DB;

class BangunanController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_bangunans|add_bangunans|edit_bangunans|delete_bangunans', ['only' => ['index','show ']]);
         $this->middleware('permission:add_bangunans', ['only' => ['create','store']]);
         $this->middleware('permission:edit_bangunans', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_bangunans', ['only' => ['destroy']]);
         $this->middleware('permission:ubah_ketersediaan', ['only' => ['ubahKetersediaan']]);
         $this->middleware('permission:ubah_kekurangan', ['only' => ['ubahKekurangan']]);
         $this->middleware('permission:kondisi_ideal', ['only' => ['kondisiIdeal']]);
         $this->middleware('permission:bangunan', ['only' => ['bangunan']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::enableQueryLog();
        $jenisPimpinan = JenisPimpinan::all();
        $komlis = Komli::all();

        if (Auth::user()->hasRole('kcd')) {
            if (request('jenis')) {
                $profils = ProfilKcd::ambil(Auth::user()->kcd_id);
                $usulanBangunan = [];
                foreach ($profils as $key => $profil) {
                    $usulans = UsulanBangunan::where('profil_id', $profil->id)
                                    ->leftJoin('profils', function($join) use ($profil){
                                        $join->where('profils.id', $profil->id);
                                    })
                                    ->leftJoin('kota_kabupatens', 'kota_kabupatens.id', 'profils.kota_kabupaten_id')
                                    ->leftJoin('profil_kcds', 'kota_kabupatens.id', 'profil_kcds.kota_kabupaten_id')
                                    ->leftJoin('kcds', 'kcds.id', 'profil_kcds.kcd_id')
                                    ->where('usulan_bangunans.jenis', request('jenis'))
                                    ->select('profils.*', 'kcds.instansi', 'usulan_bangunans.proposal', 'usulan_bangunans.id')->get();
                    if (count($usulans) > 0) {
                        foreach ($usulans as $usulan) {
                            $usulanBangunan[] = $usulan;
                        }
                    }
                }
            }else{
                abort(403);
            }
        }else{
            $usulanBangunan = UsulanBangunan::search(request(['jenis', 'search', 'filter']))
                            ->leftJoin('profils', 'profils.id', 'usulan_bangunans.profil_id')
                            ->leftJoin('kota_kabupatens', 'kota_kabupatens.id', 'profils.kota_kabupaten_id')
                            ->leftJoin('profil_kcds', 'kota_kabupatens.id', 'profil_kcds.kota_kabupaten_id')
                            ->leftJoin('kcds', 'kcds.id', 'profil_kcds.kcd_id')
                            ->select('profils.*', 'kcds.instansi', 'usulan_bangunans.proposal', 'usulan_bangunans.id')->get();
        }

        $jenis_laboratorium = JenisLaboratorium::all();
        $datas = [];
        foreach ($jenis_laboratorium as $key => $jenis) {
            $jenis = JenisLaboratoriumKomlis::select('komlis.*',)
                                        ->where('jenis_laboratorium_komlis.jenis_laboratorium_id', $jenis->id)
                                        ->leftJoin('komlis', 'jenis_laboratorium_komlis.komli_id', 'komlis.id')
                                        ->get();
            $datas[] = $jenis;
        }

        return view('bangunan.showBangunan', [
            'usulanBangunans' => $usulanBangunan,
            'kompils' => Kompeten::getKompeten(),
            'jenisPimpinans' => $jenisPimpinan,
            'komlis' => $komlis,
            'jenis_labolatoriums' => $jenis_laboratorium,
            'jurusan_jenis_laboratorium' => $datas
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
     * @param  \App\Http\Requests\StoreBangunanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBangunanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bangunan  $bangunan
     * @return \Illuminate\Http\Response
     */
    public function show(Bangunan $bangunan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bangunan  $bangunan
     * @return \Illuminate\Http\Response
     */
    public function edit(Bangunan $bangunan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBangunanRequest  $request
     * @param  \App\Models\Bangunan  $bangunan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBangunanRequest $request, Bangunan $bangunan,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bangunan  $bangunan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bangunan $bangunan)
    {
        //
    }

    public function ubahKetersediaan(Request $request, $id){
        $data = Bangunan::where('id', $id)->get()[0];

        if($data->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'ketersediaan' => 'required|numeric',
            ]);

            if($request->ket_ketersediaan){
                $validatedData['ket_ketersediaan'] = $request->ket_ketersediaan;
            }
            
            $data->update($validatedData);
            
            if($data->jenis == 'ruang_kelas'){
                $ketersediaan = Bangunan::where('id', $id)->get()[0]->ketersediaan;
                $jml_rombel = Profil::where('id', Auth::user()->profil_id)->get()[0]->jml_rombel;
                Bangunan::kondisi_ideal($jml_rombel, $ketersediaan, 'ruang_kelas');
            }else if($data->jenis == 'perpustakaan'){
                $ketersediaan = Bangunan::where('id', $id)->get()[0];
                $kekurangan = 0;
                $kekurangan = $ketersediaan->kondisi_ideal - $ketersediaan->ketersediaan;
                if($kekurangan < 0){
                    $kekurangan = 0;
                }
                $ketersediaan->update([
                    'kekurangan' => $kekurangan
            ]);   
            }

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah jumlah ketersediaan ' . str_replace("_", " ", $data->jenis));

            return redirect()->back()->with('success','Berhasil mengubah ketersediaan!');
        }else{
            abort(403);
        }
    }

    public function ubahKekurangan(Request $request, $id){
        $data = Bangunan::where('id', $id)->get()[0];
        if($data->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'kekurangan' => 'required|numeric',
            ]);

            if($request->ket_kekurangan){
                $validatedData['ket_kekurangan'] = $request->ket_kekurangan;
            }

            $data->update($validatedData);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah jumlah kekurangan ' . str_replace("_", " ", $data->jenis));

            return redirect()->back()->with('success','Berhasil mengubah kekurangan!');
        }else{
            abort(403);
        }
    }

    public function kondisiIdeal(Request $request, $id){
        $data = Bangunan::where('id', $id)->get()[0];
        if($data->profil_id == Auth::user()->profil_id){
            if($data->jenis == 'toilet' || $data->jenis == 'lab_komputer' || $data->jenis == 'lab_biologi' || $data->jenis == 'lab_fisika' || $data->jenis == 'lab_ipa' || $data->jenis == 'lab_kimia' || $data->jenis == 'lab_bahasa' || $data->jenis == 'ruang_pimpinan'){
                $validatedData = $request->validate([
                    'kondisi_ideal' => 'required|numeric',
                ]);

                if($request->ket_kondisi_ideal){
                    $validatedData['ket_kondisi_ideal'] = $request->ket_kondisi_ideal;
                }
    
                $data->update($validatedData);
    
                Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah kondisi ideal ' . str_replace("_", " ", $data->jenis));
    
                return redirect()->back()->with('success','Berhasil mengubah kondisi ideal!');
            }else{
                abort(403);
            }
        }else{
            abort(403);
        }
    }

    public function bangunan(){
        DB::enableQueryLog();
        $usulanBangunan = UsulanBangunan::search(request(['jenis']))->where('usulan_bangunans.profil_id', Auth::user()->profil_id)->get();
        // dd($usulanBangunan);
        // dd(DB::getQueryLog());
        $koleksi = UsulanKoleksi::koleksi($usulanBangunan);
        $fotos = UsulanFoto::fotos($koleksi);
        $data = Bangunan::filter(request(['jenis']))->where('profil_id', Auth::user()->profil_id)->get()[0];
        // dd($data);
        $profil = Profil::where('id', Auth::user()->profil_id)->get()[0];

        return view("bangunan.index",[
            'usulanBangunan' => $usulanBangunan,
            'usulanFotos' => $fotos,
            'dataBangunan' => $data,
            'profil' => $profil,
            'kompils' => Kompeten::getKompeten()
        ]);
    }

}
