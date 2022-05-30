<?php

namespace App\Http\Controllers;

use App\Models\BidangKompetensi;
use App\Models\Komli; 
use App\Models\Kompeten; 
use App\Http\Requests\StoreBidangKompetensiRequest;
use App\Http\Requests\UpdateBidangKompetensiRequest;
use Illuminate\Support\Facades\Auth;

class BidangKompetensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bidang = BidangKompetensi::paginate(40);
        return view("admin.bidang", [
            'bidangs' => $bidang
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
     * @param  \App\Http\Requests\StoreBidangKompetensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBidangKompetensiRequest $request)
    {
        if (Auth::user()->hasRole('dinas')) {
            $validatedData = $request->validate([
                'nama' => 'required'
            ]);
    
            BidangKompetensi::create($validatedData);
    
            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BidangKompetensi  $bidangKompetensi
     * @return \Illuminate\Http\Response
     */
    public function show(BidangKompetensi $bidangKompetensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BidangKompetensi  $bidangKompetensi
     * @return \Illuminate\Http\Response
     */
    public function edit(BidangKompetensi $bidangKompetensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBidangKompetensiRequest  $request
     * @param  \App\Models\BidangKompetensi  $bidangKompetensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBidangKompetensiRequest $request, BidangKompetensi $bidangKompetensi)
    {
        if (Auth::user()->hasRole('dinas')) {
            $validatedData = $request->validate([
                'nama' => 'required'
            ]);
    
            $bidangKompetensi->update($validatedData);
    
            return redirect()->back();
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BidangKompetensi  $bidangKompetensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(BidangKompetensi $bidangKompetensi)
    {
        foreach ($bidangKompetensi->komli as $key => $komli) {
            Kompeten::hapusKompeten($komli->kompeten);
            Komli::destroy($komli->id);
        }
        BidangKompetensi::destroy($bidangKompetensi->id);

        return redirect()->back();
    }
}
