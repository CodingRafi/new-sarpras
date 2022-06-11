<?php

namespace App\Http\Controllers;

use App\Models\JenisLaboratorium;
use App\Models\JenisLaboratoriumKomlis;
use App\Models\Komli;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreJenisLaboratoriumRequest;
use App\Http\Requests\UpdateJenisLaboratoriumRequest;

class JenisLaboratoriumController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_jenis_laboratorium|add_jenis_laboratorium|edit_jenis_laboratorium|delete_jenis_laboratorium', ['only' => ['index','show ']]);
         $this->middleware('permission:add_jenis_laboratorium', ['only' => ['create','store']]);
         $this->middleware('permission:edit_jenis_laboratorium', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_jenis_laboratorium', ['only' => ['destroy']]);
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
     * @param  \App\Http\Requests\StoreJenisLaboratoriumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisLaboratoriumRequest $request)
    {
        if (Auth::user()->hasRole('dinas')) {
            $validatedData = $request->validate([
                'jenis' => 'required',
                'komli_id' => 'required'
            ]);
    
            $jenis = JenisLaboratorium::create($validatedData);
    
            foreach ($request->komli_id as $key => $komli_id) {
                JenisLaboratoriumKomlis::create([
                    'jenis_laboratorium_id' => $jenis->id,
                    'komli_id' => $komli_id
                ]);
            }
    
            return redirect()->back();
        }else{
            abort(403);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisLaboratorium  $jenisLaboratorium
     * @return \Illuminate\Http\Response
     */
    public function show(JenisLaboratorium $jenisLaboratorium)
    {
        if(Auth::user()->hasRole('dinas')){
            $komlis = JenisLaboratorium::getJenis($jenisLaboratorium->id);
    
            return view('admin.detail-lab',[
                'jenis' => $jenisLaboratorium,
                'komlis' => $komlis,
                'option_komlis' => Komli::belumDipilihLab()
            ]);
        }else{
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisLaboratorium  $jenisLaboratorium
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisLaboratorium $jenisLaboratorium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisLaboratoriumRequest  $request
     * @param  \App\Models\JenisLaboratorium  $jenisLaboratorium
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisLaboratoriumRequest $request, JenisLaboratorium $jenisLaboratorium)
    {
        if (Auth::user()->hasRole('dinas')) {
            $validatedData = $request->validate([
                'jenis' => 'required'
            ]);
    
            $jenisLaboratorium->update($validatedData);
    
            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisLaboratorium  $jenisLaboratorium
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisLaboratorium $jenisLaboratorium)
    {
        if (Auth::user()->hasRole('dinas')) {
            foreach ($jenisLaboratorium->jenislaboratoriumkomli as $key => $jenis_komli) {
                JenisLaboratoriumKomlis::destroy($jenis_komli->id);
            }
            JenisLaboratorium::destroy($jenisLaboratorium->id);
            return redirect()->back();
        }else{
            abort(403);
        }
    }
}
