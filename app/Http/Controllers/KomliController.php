<?php

namespace App\Http\Controllers;

use App\Models\Komli;
use App\Http\Requests\StoreKomliRequest;
use App\Http\Requests\UpdateKomliRequest;
use App\Models\Kompeten;
use App\Models\Profil;
use App\Models\Praktik;
use App\Models\BidangKompetensi;
use App\Models\ProgramKompetensi;
use App\Models\Spektrum;
use App\Models\UsulanBangunan;
use App\Models\UsulanPeralatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KomliController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_komlis|add_komlis|edit_komlis|delete_komlis', ['only' => ['index','show ']]);
         $this->middleware('permission:add_komlis', ['only' => ['create','store']]);
         $this->middleware('permission:edit_komlis', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_komlis', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $komli = Komli::select('komlis.kompetensi', 'bidang_kompetensis.nama as nama_bidang', 'program_kompetensis.nama as nama_program', 'spektrums.*')->leftJoin('bidang_kompetensis', 'bidang_kompetensis.id', 'komlis.bidang_kompetensi_id')->leftJoin('program_kompetensis', 'program_kompetensis.id', 'komlis.program_kompetensi_id')->leftJoin('spektrums', 'spektrums.id', 'komlis.spektrum_id')->paginate(40);
        $bidang = BidangKompetensi::all();
        $program = ProgramKompetensi::all();
        $spektrum = Spektrum::all();

        return view("admin.komli.komli", [
            'komlis' => $komli,
            'bidangs' => $bidang,
            'programs' => $program,
            'spektrums' => $spektrum
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
                'bidang_kompetensi_id' => 'required',
                'program_kompetensi_id' => 'required',
                'spektrum_id' => 'required',
                'kompetensi' => 'required'
            ]);
    
            Komli::create($validatedData);
    
            return redirect()->back()->with('success', 'Berhasil menambah kompetensi keahlian!');
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
        $bidang = BidangKompetensi::all();
        $program = ProgramKompetensi::all();
        $spektrum = Spektrum::all();

        return view("admin.komli.edit", [
            'data' => $komli,
            'bidangs' => $bidang,
            'programs' => $program,
            'spektrums' => $spektrum
        ]);
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
                'bidang_kompetensi_id' => 'required',
                'program_kompetensi_id' => 'required',
                'spektrum_id' => 'required',
                'kompetensi' => 'required'
            ]);

            $komli->update($validatedData);
            return redirect('/komli')->with('success', 'Berhasil mengubah kompetensi keahlian!');
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
        Kompeten::hapusKompeten($kompetens);
        Komli::destroy($komli->id);
        return redirect()->back()->with('success', 'Berhasil menghapus kompetensi keahlian!');

    }
}
