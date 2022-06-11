<?php

namespace App\Http\Controllers;

use App\Models\Peralatan;
use App\Models\PeralatanTersedia;
use App\Models\Komli;
use App\Models\UsulanPeralatan;
use App\Http\Requests\StorePeralatanRequest;
use App\Http\Requests\UpdatePeralatanRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Kompeten;

class PeralatanController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_peralatan|add_peralatan|edit_peralatan|delete_peralatan', ['only' => ['index','show ']]);
         $this->middleware('permission:add_peralatan', ['only' => ['create','store']]);
         $this->middleware('permission:edit_peralatan', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_peralatan', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $komli = Komli::all();
        $peralatan = Peralatan::select('peralatans.*', 'komlis.kompetensi')->leftJoin('komlis', 'komlis.id', 'peralatans.komli_id')->paginate(40);
        return view('peralatan.index', [
            'semua_jurusan' => $komli,
            'peralatans' => $peralatan,
            'kompils' => Kompeten::getKompeten()
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
     * @param  \App\Http\Requests\StorePeralatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeralatanRequest $request)
    {
        if(Auth::user()->hasRole('dinas')){
            $validatedData = $request->validate([
                'komli_id' => 'required',
                'nama' => 'required',
                'rasio' => 'required',
                'kategori' => 'required',
                'deskripsi' => 'required'
            ]);
    
            Peralatan::create($validatedData);
    
            return redirect()->back()->with('success', 'Berhasil menambah peralatan!');
        }else{
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function show(Peralatan $peralatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Peralatan $peralatan)
    {
        if (Auth::user()->hasRole('dinas')) {
            $komli = Komli::all();
            return view('peralatan.edit',[
                'komlis' => $komli,
                'peralatan' => $peralatan
            ]);
        } else {
            abort(403);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeralatanRequest  $request
     * @param  \App\Models\Peralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeralatanRequest $request, Peralatan $peralatan)
    {
        if (Auth::user()->hasRole('dinas')) {
            $validatedData = $request->validate([
                'komli_id' => 'required',
                'nama' => 'required',
                'kategori' => 'required',
                'deskripsi' => 'required',
                'rasio' => 'required'
            ]);
    
            $peralatan->update($validatedData);
    
            return redirect('/peralatan')->with('success', 'Berhasil mengubah peralatan!');
        } else {
            abort(403);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peralatan $peralatan)
    {
        if (Auth::user()->hasRole('dinas')) {
            Peralatan::destroy($peralatan->id);
            return redirect()->back()->with('success', 'Berhasil menghapus peralatan!');
        } else {
            abort(403);
        }
    }

    public function showPeralatan($id){
        $kompeten = Kompeten::find($id);
        $peralatans = Peralatan::where('komli_id', $kompeten->komli->id)->select('peralatans.*', 'komlis.kompetensi')->leftJoin('komlis', 'peralatans.komli_id', 'komlis.id')->paginate(15);
        $peralatanTersedias = PeralatanTersedia::where('kompeten_id', $id)->get();
        $peralatansOptions = Peralatan::where('komli_id', $kompeten->komli_id)->get();
        $peralatanOptionsTersedia = Peralatan::option_peralatan_tersedia( Auth::user()->profil );
        $usulanPeralatan = UsulanPeralatan::where('usulan_peralatans.profil_id', Auth::user()->profil_id)->select('usulan_peralatans.*', 'komlis.kompetensi', 'peralatans.nama')->leftJoin('kompetens', 'kompetens.id', 'usulan_peralatans.kompeten_id')->leftJoin('komlis', 'komlis.id', 'kompetens.komli_id')->leftJoin('peralatans', 'usulan_peralatans.peralatan_id', 'peralatans.id')->get();
        // dd($usulanPeralatan);
        return view('peralatan-sekolah.index', [
            'peralatanTersedias' => $peralatanTersedias,
            'peraturans' => $peralatans,
            'kompils' => Kompeten::getKompeten(),
            'peralatanOptions' => $peralatansOptions,
            'komli' => $kompeten->komli,
            'kompeten' => $kompeten,
            'usulanPeralatans' => $usulanPeralatan,
            'peralatanOptionsTersedias' => $peralatanOptionsTersedia,
        ]);
    }
}
