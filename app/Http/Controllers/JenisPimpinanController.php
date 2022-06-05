<?php

namespace App\Http\Controllers;

use App\Models\JenisPimpinan;
use App\Http\Requests\StoreJenisPimpinanRequest;
use App\Http\Requests\UpdateJenisPimpinanRequest;
use App\Models\Kompeten;
use Illuminate\Support\Facades\Auth;

class JenisPimpinanController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_jenis_pimpinan|add_jenis_pimpinan|edit_jenis_pimpinan|delete_jenis_pimpinan', ['only' => ['index','show ']]);
         $this->middleware('permission:add_jenis_pimpinan', ['only' => ['create','store']]);
         $this->middleware('permission:edit_jenis_pimpinan', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_jenis_pimpinan', ['only' => ['destroy']]);
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
     * @param  \App\Http\Requests\StoreJenisPimpinanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisPimpinanRequest $request)
    {
        if(Auth::user()->hasRole('dinas')){
            $validatedData = $request->validate([
                'nama' => 'required'
            ]);
    
            JenisPimpinan::create($validatedData);
            
            //! belum buat log
            
            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisPimpinan  $jenisPimpinan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisPimpinan $jenisPimpinan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisPimpinan  $jenisPimpinan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisPimpinan $jenisPimpinan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisPimpinanRequest  $request
     * @param  \App\Models\JenisPimpinan  $jenisPimpinan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisPimpinanRequest $request, JenisPimpinan $jenisPimpinan)
    {
        if(Auth::user()->hasRole('dinas')){
            $validatedData = $request->validate([
                'nama' => 'required'
            ]);

            $jenisPimpinan->update($validatedData);

            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisPimpinan  $jenisPimpinan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisPimpinan $jenisPimpinan)
    {
        if (Auth::user()->hasRole('dinas')) {
            JenisPimpinan::destroy($jenisPimpinan->id);

            return redirect()->back();
        }else{
            abort(403);
        }
    }
}
