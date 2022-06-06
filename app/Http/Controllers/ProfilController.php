<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Komli;
use App\Models\Log;
use App\Models\User;
use App\Models\Kompeten;
use App\Models\Koleksi;
use App\Models\Bangunan;
use App\Models\KompetenDepo;
use App\Models\Jeniskoleksi;
use App\Models\ProfilDepo;
use App\Http\Requests\StoreProfilRequest;
use App\Http\Requests\UpdateProfilRequest;
use Illuminate\Support\Facades\Auth;
use DB;

class ProfilController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:view_profils|add_profils|edit_profils|delete_profils', ['only' => ['index','show ']]);
         $this->middleware('permission:add_profils', ['only' => ['create','store']]);
         $this->middleware('permission:edit_profils', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_profils', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('jeniskompeten.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfilRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfilRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {  
        if($profil->id == Auth::user()->profil_id || Auth::user()->getRoleNames()[0] != 'sekolah'){
            $profilDepo = ProfilDepo::where('id', $profil->id)->get()[0];
            $koleksis = $profilDepo->koleksi;
            $fotos = [];
            $komli = [];
            $jenis_koleksi_terpilih = [];
            
            foreach($koleksis as $koleksi){
                $fotos[] = $koleksi->foto;
                $jenis_koleksi_terpilih[] = $koleksi->jeniskoleksi;
                $koleksi_id = $koleksi->id;
            }
            
            foreach($profil->kompeten as $kompe){
                $komli[] = $kompe->komli;
            }

            $semua_jurusan = Kompeten::pilihanJurusan($profil);

            $jurusanDepo = KompetenDepo::where('profil_depo_id', $profil->id)->get();
            
            DB::enableQueryLog();

            $semua_jenis_koleksi = Koleksi::jenisPilihan($profil);

            $logs = [];
            $logQuery = Log::where('profil_id', $profil->id)->get();

            foreach ($logQuery as $key => $log) {
                $logs[] = [
                    'name' => User::where('id', $log->users_id)->get()[0]->name,
                    'keterangan' => $log->keterangan,
                    'created_at' => $log->created_at
                ];
            }
            
            return view('profil.index', [
                'profil' => $profil,
                'kopetensikeahlians'=> $profil->kompeten,
                'koleksis' => $profilDepo->koleksi,
                'fotos' => $fotos,
                'komli' => $komli,
                'profil_depo' => $profilDepo,
                'semua_jurusan' => $semua_jurusan,
                'logs' => $logs,
                'jenis_koleksis' => $semua_jenis_koleksi,
                'jenis_koleksi_terpilih' => $jenis_koleksi_terpilih,
                'jurusanDepos' => $jurusanDepo,
                'kompils' => Kompeten::getKompeten()
            ]);
        }else{
            return abort(403);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil $profil)
    {
        return view('profil.edit', [
            'data' => $profil,
            'kompils' => Kompeten::getKompeten()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfilRequest  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfilRequest $request, Profil $profil)
    {
        if($request->profil_depo_id == Auth::user()->profil_id){
            $jml_lk = 0;
            $jml_pr = 0;
            $validatedData = $request->validate([
                'profil_depo_id' => 'required',
                'nama_kepala_sekolah' => 'string|nullable',
                'kabupaten' => 'string|nullable',
                'kecamatan' => 'string|nullable',
                'alamat' => 'string|nullable',
                'email' => 'email|nullable|unique:users',
                'website' => 'string|nullable',
                'instagram' => 'string|required',
                'youtube' => 'string|required',
                'gtk' => 'string|nullable',
                'facebook' => 'string|nullable',
                'twitter' => 'string|nullable',
                'tiktok' => 'string|nullable',
                'nomor_telepon' => 'string|nullable',
                'jml_rombel' => 'numeric|nullable',
                'lat' => 'string|nullable',
                'long' => 'string|nullable'
            ]);

            if ($request->email) {
                $user = Auth::user()->update([
                    'email' => $request->email
                ]);
            }
    
            Log::createLog($profil->id, Auth::user()->id, 'Mengubah Data Sekolah');
    
            Profil::where('id' , $profil->id)->update($validatedData);

            $ketersediaan = Bangunan::where('profil_id', Auth::user()->profil_id)->where('jenis', 'ruang_kelas')->get()[0]->ketersediaan;

            Bangunan::kondisi_ideal($request->jml_rombel, $ketersediaan, 'ruang_kelas');
    
            if(count($profil->kompeten) == 0){
                $validatedData['jml_siswa_l'] = 0;
                $validatedData['jml_siswa_p'] = 0;
            }else{
                foreach($profil->kompeten as $kopetensi){
                     $jml_lk += $kopetensi->jml_lk;
                     $jml_pr += $kopetensi->jml_pr;
                }
                $validatedData['jml_siswa_l'] = $jml_lk;
                $validatedData['jml_siswa_p'] = $jml_pr;
    
                $jml_lk = 0;
                $jml_pr = 0;
            }
    
            return redirect('/profil/' . $request->profil_depo_id)->with('success', 'Berhasil mengubah profil sekolah!');
        }else{
            abort(403);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        //
    }
}
