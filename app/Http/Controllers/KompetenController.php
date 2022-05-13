<?php

namespace App\Http\Controllers;

use App\Models\Kompeten;
use App\Models\Komli;
use App\Models\Log;
use App\Models\Profil;
use App\Http\Requests\StoreKompetenRequest;
use App\Http\Requests\UpdateKompetenRequest;
use Illuminate\Support\Facades\Auth;

class KompetenController extends Controller
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
    public function create($id)
    {
        $komli = Komli::all();
        $profilKomli = Profil::where('id', $id)->get()[0];

        return view('jeniskompeten.create', [
            'profil_id' => $id,
            'komlis' => $komli,
            'profilKompetens' => $profilKomli->kompeten
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKompetenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKompetenRequest $request)
    {
        $validatedData = $request->validate([
            'profil_id' => 'required',
            'jurusanTerpilih' => 'required'
        ]);

        // dd(Auth::user());
        // dd($request);

        foreach($request->jurusanTerpilih as $kom){
            Kompeten::create([
                'profil_id' => $request->profil_id,
                'komli_id' => $kom,
                'jml_lk' => 0,
                'jml_pr' => 0,
            ]);
        }

        $profil = Profil::where('id', $request->profil_id)->get()[0];

        $jml_lk = 0;
        $jml_pr = 0;
        foreach($profil->kompeten as $kopetensi){
            $jml_lk += $kopetensi->jml_lk;
            $jml_pr += $kopetensi->jml_pr;
        }

        $updateData = [
            'jml_siswa_l' => $jml_lk,
            'jml_siswa_p' => $jml_pr
        ];

        Profil::where('id', $request->profil_id)->update($updateData);
        $jml_lk = 0;
        $jml_pr = 0;

        $logs = Log::create([
            'profil_id' => $request->profil_id,
            'users_id' => Auth::user()->id,
            'keterangan' => 'Menambahkan ' . count($request->jurusanTerpilih) . ' jurusan' 
        ]);

        return redirect('/profil/' . $request->profil_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kompeten  $kompeten
     * @return \Illuminate\Http\Response
     */
    public function show(Kompeten $kompeten)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kompeten  $kompeten
     * @return \Illuminate\Http\Response
     */
    public function edit(Kompeten $kompeten, $id)
    {
        // $kompetens = Profil::where('id', $id)->get()[0]->kompeten;
        // $komli = [];

        // foreach($kompetens as $kompeten){
        //     $komli[] = $kompeten->komli;
        // }

        // return view('jeniskompeten.edit', [
        //     'kompetens' => $kompetens,
        //     'komlis' => $komli,
        //     'profil_id' => $id
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKompetenRequest  $request
     * @param  \App\Models\Kompeten  $kompeten
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKompetenRequest $request, Kompeten $kompeten)
    {
        // dd($request);
        $validatedData = $request->validate([
            'profil_id' => 'required',
            'id_kopetensi' => 'required',
            'jml_lk' => 'required',
            'jml_pr' => 'required'
        ]);

        foreach($request->id_kopetensi as $key => $kopetensi){
            Kompeten::where('profil_id', $request->profil_id)->where('id', $kopetensi)->update([
                'jml_lk' => $request->jml_lk[$key],
                'jml_pr' => $request->jml_pr[$key],
            ]);
        }   

        $profil = Profil::where('id', $request->profil_id)->get()[0];

        $jml_lk = 0;
        $jml_pr = 0;
        foreach($profil->kompeten as $kopetensi){
            $jml_lk += $kopetensi->jml_lk;
            $jml_pr += $kopetensi->jml_pr;
        }

        $updateData = [
            'jml_siswa_l' => $jml_lk,
            'jml_siswa_p' => $jml_pr
        ];

        Profil::where('id', $request->profil_id)->update($updateData);
        $jml_lk = 0;
        $jml_pr = 0;

        $logs = Log::create([
            'profil_id' => $request->profil_id,
            'users_id' => Auth::user()->id,
            'keterangan' => 'Mengubah jumlah siswa'
        ]);

        return redirect('/profil/' . $request->profil_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kompeten  $kompeten
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kompeten $kompeten)
    {
        Kompeten::destroy($kompeten->id);

        $profil = Profil::where('id', $kompeten->profil_id)->get()[0];

        $jml_lk = 0;
        $jml_pr = 0;
        foreach($profil->kompeten as $kopetensi){
            $jml_lk += $kopetensi->jml_lk;
            $jml_pr += $kopetensi->jml_pr;
        }

        $updateData = [
            'jml_siswa_l' => $jml_lk,
            'jml_siswa_p' => $jml_pr
        ];

        Profil::where('id', $kompeten->profil_id)->update($updateData);
        $jml_lk = 0;
        $jml_pr = 0;

        $komli = Komli::where('id', $kompeten->komli_id)->get()[0];

        $logs = Log::create([
            'profil_id' => $kompeten->profil_id,
            'users_id' => Auth::user()->id,
            'keterangan' => 'Menghapus jurusan ' . $komli->kompetensi
        ]);

        return redirect('/profil/' . $kompeten->profil_id);
    }
}
