<?php

namespace App\Http\Controllers;

use App\Models\Spektrum;
use App\Http\Requests\StoreSpektrumRequest;
use App\Http\Requests\UpdateSpektrumRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SpektrumController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_spektrums|add_spektrums|edit_spektrums|delete_spektrums', ['only' => ['index','show ']]);
         $this->middleware('permission:add_spektrums', ['only' => ['create','store']]);
         $this->middleware('permission:edit_spektrums', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_spektrums', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spektrum = Spektrum::paginate(40);
        return view("admin.spektrum.spektrum", [
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
     * @param  \App\Http\Requests\StoreSpektrumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpektrumRequest $request)
    {
        if (Auth::user()->hasRole('dinas')) {
            $validatedData = $request->validate([
                'nama' => 'required',
                'aturan' => 'required',
                'tanggal' => 'required',
                'lampiran' => 'required|mimes:pdf|file|max:5120'
            ]);

            $validatedData['lampiran'] = $request->file('lampiran')->store('lampiran-spektrum');

            Spektrum::create($validatedData);

            return redirect()->back()->with('success', 'Berhasil menambah spektrum!');
        }else{
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spektrum  $spektrum
     * @return \Illuminate\Http\Response
     */
    public function show(Spektrum $spektrum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spektrum  $spektrum
     * @return \Illuminate\Http\Response
     */
    public function edit(Spektrum $spektrum)
    {
        return view('admin.spektrum.edit', [
            'data' => $spektrum
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpektrumRequest  $request
     * @param  \App\Models\Spektrum  $spektrum
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpektrumRequest $request, Spektrum $spektrum)
    {
        if (Auth::user()->hasRole('dinas')) {
            $validatedData = $request->validate([
                'nama' => 'required',
                'aturan' => 'required',
                'tanggal' => 'required',
                'lampiran' => 'mimes:pdf|file|max:5120'
            ]);

            if($request->file('lampiran')){
                if($spektrum->lampiran){
                    Storage::delete($spektrum->lampiran);
                }
                $validatedData['lampiran'] = $request->file('lampiran')->store('lampiran-spektrum');
            }

            $spektrum->update($validatedData);

            return redirect('/spektrum')->with('success', 'Berhasil mengubah spektrum!');
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spektrum  $spektrum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spektrum $spektrum)
    {
        foreach ($spektrum->komli as $key => $komli) {
            Kompeten::hapusKompeten($komli->kompeten);
            Komli::destroy($komli->id);
        }
        Spektrum::destroy($spektrum->id);

        return redirect()->back()->with('success', 'Berhasil menghapus spektrum!');
    }
}
