<?php

namespace App\Http\Controllers;

use App\Models\Komli;
use App\Http\Requests\StoreKomliRequest;
use App\Http\Requests\UpdateKomliRequest;
use App\Models\Kompeten;
use App\Models\Profil;
use App\Models\Praktik;
use App\Models\UsulanBangunan;
use App\Models\UsulanPeralatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KomliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $komli = Komli::paginate(40);
        return view("admin.komli", [
            'komlis' => $komli
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
     * @param  \App\Http\Requests\StoreKomliRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKomliRequest $request)
    {
        if (Auth::user()->hasRole('dinas')) {
            $validatedData = $request->validate([
                'bidang' => 'required',
                'program' => 'required',
                'kompetensi' => 'required'
            ]);
    
            Komli::create($validatedData);
    
            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Komli  $komli
     * @return \Illuminate\Http\Response
     */
    public function show(Komli $komli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Komli  $komli
     * @return \Illuminate\Http\Response
     */
    public function edit(Komli $komli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKomliRequest  $request
     * @param  \App\Models\Komli  $komli
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKomliRequest $request, Komli $komli)
    {
        if (Auth::user()->hasRole('dinas')) {
            $validatedData = $request->validate([
               'bidang' => 'required',
               'program' => 'required',
               'kompetensi' => 'required' 
            ]);

            $komli->update($validatedData);
            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Komli  $komli
     * @return \Illuminate\Http\Response
     */
    public function destroy(Komli $komli)
    {
        $kompetens = Kompeten::where('komli_id', $komli->id)->get();
        foreach ($kompetens as $key => $kompeten) {

            // Profil
            $jml_lk = 0;
            $jml_pr = 0;
            if(count($kompeten->profil->kompeten) == 0){
                Profil::where('id', $kompeten->profil->id)->update([
                    'jml_siswa_l' => 0,
                    'jml_siswa_p' => 0,
                ]);
            }else{
                foreach($kompeten->profil->kompeten as $kopetensi){
                     $jml_lk += $kopetensi->jml_lk;
                     $jml_pr += $kopetensi->jml_pr;
                }
                Profil::where('id', $kompeten->profil->id)->update([
                    'jml_siswa_l' => $jml_lk,
                    'jml_siswa_p' => $jml_pr,
                ]);
    
                $jml_lk = 0;
                $jml_pr = 0;
            }

            // Usulan Bangunan
            $usulanBangunans = UsulanBangunan::where('kompeten_id', $kompeten->id)->get();
            foreach ($usulanBangunans as $usulan) {
                UsulanBangunan::deleteUsulan($usulan);
            }

            $usulanPeralatans = UsulanPeralatan::where('kompeten_id', $kompeten->id)->get();
            foreach ($usulanPeralatans as $usulan) {
                Storage::delete($usulan->proposal);
                UsulanPeralatan::destroy($usulan->id);
            }

            $praktiks = Praktik::where('kompeten_id', $kompeten->id)->get();
            foreach ($praktiks as $praktik) {
                Praktik::destroy($data->id);
            }

            Kompeten::destroy($kompeten->id);

        }
        Komli::destroy($komli->id);
        return redirect()->back();

    }
}
