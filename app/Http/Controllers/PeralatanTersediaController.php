<?php

namespace App\Http\Controllers;

use App\Models\PeralatanTersedia;
use App\Models\Peralatan;
use App\Models\Kompeten;
use App\Models\Komli;
use App\Models\Log;
use App\Http\Requests\StorePeralatanTersediaRequest;
use App\Http\Requests\UpdatePeralatanTersediaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PeralatanTersediaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_peralatan_tersedia|add_peralatan_tersedia|edit_peralatan_tersedia|delete_peralatan_tersedia', ['only' => ['index','show ']]);
         $this->middleware('permission:add_peralatan_tersedia', ['only' => ['create','store']]);
         $this->middleware('permission:edit_peralatan_tersedia', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_peralatan_tersedia', ['only' => ['destroy']]);
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
     * @param  \App\Http\Requests\StorePeralatanTersediaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeralatanTersediaRequest $request)
    {
        $kompeten = Kompeten::find($request->kompeten_id);
        $kompetensi = PeralatanTersedia::where('kompeten_id', $request->kompeten_id)->first();

        if($kompeten->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'kompeten_id' => 'required',
                'peralatan_id' => 'nullable',
                'nama' => 'string|nullable',
                'kategori' => 'required',
                'katersediaan' => 'required',
                'kekurangan' => 'required'
            ]);
            
            if ($validatedData['kekurangan'] < 1 && $validatedData['katersediaan'] > 0) {
                $validatedData['status'] = 'ideal';
            }else{
                $validatedData['status'] = 'kekurangan';
            }

            $validatedData['profil_id'] = Auth::user()->profil_id;
            
            PeralatanTersedia::create($validatedData);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Membuat Ketersediaan Peralatan' . $kompeten->komli->kompetensi);

            return redirect()->back()->with('success', 'Berhasil menyimpan ketersediaan peralatan '.$kompeten->komli->kompetensi.'!');
        }else{
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PeralatanTersedia  $peralatanTersedia
     * @return \Illuminate\Http\Response
     */
    public function show(PeralatanTersedia $peralatanTersedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeralatanTersedia  $peralatanTersedia
     * @return \Illuminate\Http\Response
     */
    public function edit(PeralatanTersedia $peralatan_tersedium)
    {
        if($peralatan_tersedium->profil_id == Auth::user()->profil_id){
            $kompeten = Kompeten::find($peralatan_tersedium->kompeten_id);
            $peralatansOptions = Peralatan::where('komli_id', $kompeten->komli_id)->get();

            return view('peralatan-sekolah.ketersediaan.edit',[
                'peralatanOptions' => $peralatansOptions,
                'data' => $peralatan_tersedium,
                'kompils' => Kompeten::getKompeten()
            ]);
        }else{
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeralatanTersediaRequest  $request
     * @param  \App\Models\PeralatanTersedia  $peralatanTersedia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeralatanTersediaRequest $request, PeralatanTersedia $peralatan_tersedium)
    {
        $kompeten = Kompeten::find($request->kompeten_id);
        $kompetensi = PeralatanTersedia::where('kompeten_id', $request->kompeten_id)->first();

        if($peralatan_tersedium->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'peralatan_id' => 'nullable',
                'nama' => 'string|nullable',
                'kategori' => 'required',
                'katersediaan' => 'required',
                'kekurangan' => 'required'
            ]);
            
            if ($validatedData['kekurangan'] < 1 && $validatedData['katersediaan'] > 0) {
                $validatedData['status'] = 'ideal';
            }else{
                $validatedData['status'] = 'kekurangan';
            }

            $peralatan_tersedium->update($validatedData);

            // Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah ketersediaan Peralatan ' . str_replace("_", " ", $kompetensi->kompeten->komli->kompetensi));

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah Ketersediaan Peralatan' . $kompeten->komli->kompetensi);

            return redirect('/peralatan-sekolah/'.$peralatan_tersedium->kompeten_id)->with('success', 'Berhasil mengubah ketersediaan peralatan ' . $kompeten->komli->kompetensi . '!');
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeralatanTersedia  $peralatanTersedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeralatanTersedia $peralatan_tersedium)
    {
        if($peralatan_tersedium->profil_id == Auth::user()->profil_id){
            $logJurusan = Komli::Join('kompetens', 'komlis.id', 'kompetens.komli_id')
            ->Join('peralatan_tersedias','kompetens.id','peralatan_tersedias.kompeten_id')
            ->where('peralatan_tersedias.kompeten_id', $peralatan_tersedium->kompeten_id)
            ->pluck('kompetensi')
            ->first();
            
            PeralatanTersedia::deletePeralatan($peralatan_tersedium);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Menghapus Ketersediaan Peralatan '.$logJurusan);

            return redirect()->back()->with('success', 'Berhasil menghapus ketersediaan peralatan ' . $logJurusan . '!');
        }else{
            abort(403);
        }
    }
}
