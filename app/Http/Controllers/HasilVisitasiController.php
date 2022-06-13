<?php

namespace App\Http\Controllers;

use App\Models\HasilVisitasi;
use App\Models\visitasi;
use App\Models\UnsurVerifikasi;
use App\Http\Requests\StoreHasilVisitasiRequest;
use App\Http\Requests\UpdateHasilVisitasiRequest;
use Illuminate\Support\Facades\Auth;

class HasilVisitasiController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_hasil_visitasi|add_hasil_visitasi|edit_hasil_visitasi|delete_hasil_visitasi', ['only' => ['index','show ']]);
         $this->middleware('permission:add_hasil_visitasi', ['only' => ['create','store']]);
         $this->middleware('permission:edit_hasil_visitasi', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_hasil_visitasi', ['only' => ['destroy']]);
    }

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHasilVisitasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHasilVisitasiRequest $request)
    {
        if( Auth::user()->hasRole('verifikator') ){
            dd($request);
            $unsurs = UnsurVerifikasi::all();
            $visitasi = Visitasi::where('id', $request->visitasi_id)->get()->first();
            
            foreach ($unsurs as $key => $unsur) {
                if($request['unsur_id_' . $unsur->id]){
                    HasilVisitasi::create([
                        'visitasi_id' => $request->visitasi_id,
                        'unsur_verifikasi_id' => $unsur->id,
                        'hasil' => $request['unsur_id_' . $unsur->id]
                    ]);
                }else{
                    HasilVisitasi::create([
                        'visitasi_id' => $request->visitasi_id,
                        'unsur_verifikasi_id' => $unsur->id,
                    ]);
                }
            }

            $visitasi->update([
                'status' => 'simpan'
            ]);

            return redirect()->back();

        }else{
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HasilVisitasi  $hasilVisitasi
     * @return \Illuminate\Http\Response
     */
    public function show(HasilVisitasi $hasilVisitasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HasilVisitasi  $hasilVisitasi
     * @return \Illuminate\Http\Response
     */
    public function edit(HasilVisitasi $hasilVisitasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHasilVisitasiRequest  $request
     * @param  \App\Models\HasilVisitasi  $hasilVisitasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHasilVisitasiRequest $request, HasilVisitasi $hasilVisitasi)
    {
        $visitasi = Visitasi::where('id', $request->visitasi_id)->get()->first();

        foreach ($visitasi->hasilVisitasi as $hasil) {
            if($request['unsur_id_' . $hasil->id]){
                $hasil->update([
                    'hasil' => $request['unsur_id_' . $hasil->id]
                ]);
            }
        }

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HasilVisitasi  $hasilVisitasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(HasilVisitasi $hasilVisitasi)
    {
        //
    }
}
