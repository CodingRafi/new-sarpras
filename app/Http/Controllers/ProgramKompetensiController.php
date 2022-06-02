<?php

namespace App\Http\Controllers;

use App\Models\ProgramKompetensi;
use App\Models\Komli;
use App\Models\Kompeten;
use App\Http\Requests\StoreProgramKompetensiRequest;
use App\Http\Requests\UpdateProgramKompetensiRequest;
use Illuminate\Support\Facades\Auth;

class ProgramKompetensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program = ProgramKompetensi::paginate(40);
        return view("admin.program", [
            'programs' => $program
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
     * @param  \App\Http\Requests\StoreProgramKompetensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgramKompetensiRequest $request)
    {
        if (Auth::user()->hasRole('dinas')) {
            $validatedData = $request->validate([
                'nama' => 'required'
            ]);
    
            ProgramKompetensi::create($validatedData);
    
            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProgramKompetensi  $programKompetensi
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramKompetensi $programKompetensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgramKompetensi  $programKompetensi
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramKompetensi $programKompetensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProgramKompetensiRequest  $request
     * @param  \App\Models\ProgramKompetensi  $programKompetensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProgramKompetensiRequest $request, ProgramKompetensi $programKompetensi)
    {
        if (Auth::user()->hasRole('dinas')) {
            $validatedData = $request->validate([
                'nama' => 'required'
            ]);
    
            $programKompetensi->update($validatedData);
    
            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgramKompetensi  $programKompetensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramKompetensi $programKompetensi)
    {
        foreach ($programKompetensi->komli as $key => $komli) {
            Kompeten::hapusKompeten($komli->kompeten);
            Komli::destroy($komli->id);
        }
        ProgramKompetensi::destroy($programKompetensi->id);

        return redirect()->back();
    }
}
