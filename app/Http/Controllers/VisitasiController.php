<?php

namespace App\Http\Controllers;

use App\Models\Visitasi;
use App\Models\Profil;
use App\Models\User;
use App\Models\Kompeten;
use App\Models\UnsurVerifikasi;
use App\Http\Requests\StoreVisitasiRequest;
use App\Http\Requests\UpdateVisitasiRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VisitasiController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_visitasi|add_visitasi|edit_visitasi|delete_visitasi', ['only' => ['index','show ']]);
         $this->middleware('permission:add_visitasi', ['only' => ['create','store']]);
         $this->middleware('permission:edit_visitasi', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_visitasi', ['only' => ['destroy']]);
         $this->middleware('permission:all_visitasi', ['only' => ['allVisitasi']]);
         $this->middleware('permission:visitasi_publish', ['only' => ['visitasiPublish']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereNotNull('instansi')
                        ->select('users.*', 'kota_kabupatens.nama as nama_kota_kabupaten', 'kota_kabupatens.id as id_kota_kabupatens')->leftJoin('kota_kabupatens', 'users.kota_kabupaten_id', 'kota_kabupatens.id')->get();
        $verifikators = [];
        foreach ($users as $key => $user) {
            if($user->hasRole('verifikator')){
                $verifikators[] = $user;
            }
        }

        $visitasis = Visitasi::select('visitasis.*', 'users.name as nama_verifikator', 'profils.nama as nama_sekolah')
                                ->leftJoin('users', 'users.id', 'visitasis.user_id')
                                ->leftJoin('profils', 'profils.id', 'visitasis.profil_id')
                                ->paginate(40);

        return view('admin.visitasi.visitasisekolah',[
            'verifikators' => $verifikators,
            'profils' => Profil::all(),
            'visitasis' => $visitasis
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
     * @param  \App\Http\Requests\StoreVisitasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVisitasiRequest $request)
    {
        if (Auth::user()->hasRole('dinas')) {
            $validatedData = $request->validate([
                'user_id' => 'required',
                'profil_id' => 'required',
                'keperluan' => 'required',
                'tanggal_visitasi' => 'required',
                'surat_tugas' => 'required|mimes:pdf|file|max:5120'
            ]);
            
            $validatedData['status'] = 'proses_visitasi';
            $validatedData['surat_tugas'] = $request->file('surat_tugas')->store('surat_kerja_visitasi');
    
            Visitasi::create($validatedData);
    
            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitasi  $visitasi
     * @return \Illuminate\Http\Response
     */
    public function show(Visitasi $visitasi)
    {
        if ( Auth::user()->profil_id == $visitasi->profil_id || Auth::user()->hasRole('verifikator')) {
            $hasil = Visitasi::select('hasil_visitasis.*', 'unsur_verifikasis.*', 'hasil_visitasis.id as id_hasil')
                        ->where('visitasis.id', $visitasi->id)
                        ->leftJoin('hasil_visitasis', 'hasil_visitasis.visitasi_id', 'visitasis.id')
                        ->leftJoin('unsur_verifikasis', 'unsur_verifikasis.id', 'hasil_visitasis.unsur_verifikasi_id')
                        ->get();
    
            // $visitasi = Visitasi::where('visitasis.id', $visitasi->id)->with('user')->get();
    
                        // dd($hasil);
            return view('verifikator.detailmonitoring',[
                'visitasi' => $visitasi,
                'profil' => $visitasi->profil,
                'user' => $visitasi->user,
                'unsurs' => UnsurVerifikasi::all(),
                'kompils' => Kompeten::getKompeten(),
                'hasils' => $hasil
            ]);
        }else{
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitasi  $visitasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitasi $visitasi)
    {
        if (Auth::user()->hasRole('dinas')) {
            $users = User::whereNotNull('instansi')
                            ->select('users.*', 'kota_kabupatens.nama as nama_kota_kabupaten', 'kota_kabupatens.id as id_kota_kabupatens')->leftJoin('kota_kabupatens', 'users.kota_kabupaten_id', 'kota_kabupatens.id')->get();
            $verifikators = [];
            foreach ($users as $key => $user) {
                if($user->hasRole('verifikator')){
                    $verifikators[] = $user;
                }
            }
            return view('admin.visitasi.edit',[
                'data' => $visitasi,
                'verifikators' => $verifikators,
                'profils' => Profil::all(),
            ]);
        }else{
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVisitasiRequest  $request
     * @param  \App\Models\Visitasi  $visitasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisitasiRequest $request, Visitasi $visitasi)
    {
        if (Auth::user()->hasRole('dinas')) {
            $validatedData = $request->validate([
                'user_id' => 'required',
                'profil_id' => 'required',
                'keperluan' => 'required',
                'tanggal_visitasi' => 'required',
                'surat_tugas' => 'mimes:pdf|file|max:5120'
            ]);

            if($request->file('surat_tugas')){
                if($visitasi->surat_tugas){
                    Storage::delete($visitasi->surat_tugas);
                }
                $validatedData['surat_tugas'] = $request->file('proposal')->store('proposal-usulan-bangunan');
            }

            $visitasi->update($validatedData);

            return redirect('/visitasi');
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitasi  $visitasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitasi $visitasi)
    {
        if (Auth::user()->hasRole('dinas')) {
            Storage::delete($visitasi->surat_tugas);
            Visitasi::destroy($visitasi->id);
            return redirect()->back();
        }else{
            abort(403);
        }
    }

    public function allVisitasi(Request $request){
        if (Auth::user()->hasRole('verifikator')) {
            $visitasi = Visitasi::select('visitasis.*', 'profils.nama as nama_sekolah')
                            ->where('user_id', Auth::user()->id)
                            ->leftJoin('profils', 'profils.id', 'visitasis.profil_id')
                            ->get();
        }else{
            $visitasi = Visitasi::where('profil_id', Auth::user()->profil_id)->where('visitasis.status', 'unggah')->get();
            // dd($visitasi);
            // $visitasi = ->visitasi;
        }

        return view('verifikator.monitoringvertif', [
            'visitasis' => $visitasi,
            'kompils' => Kompeten::getKompeten(),
        ]);
    }

    public function visitasiPublish(Request $request){
        $visitasi = Visitasi::where('id', $request->visitasi_id)->get()->first();
        
        $visitasi->update([
            'status' => 'unggah'
        ]);

        return redirect()->back();
    }
}
