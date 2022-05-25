<?php

namespace App\Http\Controllers;

use App\Models\Peralatan;
use App\Models\Komli;
use App\Http\Requests\StorePeralatanRequest;
use App\Http\Requests\UpdatePeralatanRequest;
use Illuminate\Support\Facades\Auth;

class PeralatanController extends Controller
{
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
            'peralatans' => $peralatan
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
    
            return redirect()->back();
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
    
            return redirect('/peralatan');
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
            return redirect()->back();
        } else {
            abort(403);
        }
        
    }
}
