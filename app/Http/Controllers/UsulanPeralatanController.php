<?php

namespace App\Http\Controllers;

use App\Models\UsulanPeralatan;
use App\Http\Requests\StoreUsulanPeralatanRequest;
use App\Http\Requests\UpdateUsulanPeralatanRequest;
use App\Models\Kompeten;
use App\Models\Peralatan;
use Illuminate\Support\Facades\Storage;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class UsulanPeralatanController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_usulan_peralatan|add_usulan_peralatan|edit_usulan_peralatan|delete_usulan_peralatan', ['only' => ['index','show ']]);
         $this->middleware('permission:add_usulan_peralatan', ['only' => ['create','store']]);
         $this->middleware('permission:edit_usulan_peralatan', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_usulan_peralatan', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usulanPeralatan = UsulanPeralatan::filter(request(['search']))->select('usulan_peralatans.*', 'komlis.kompetensi')
                        ->leftJoin('peralatans', 'peralatans.id', 'usulan_peralatans.peralatan_id')
                        ->leftJoin('profils', 'profils.id', 'usulan_peralatans.profil_id')
                        ->leftJoin('kompetens', 'kompetens.id', 'usulan_peralatans.kompeten_id')
                        ->leftJoin('komlis', 'komlis.id', 'kompetens.id')->paginate(40);
        
        return view('admin.usulanperalatan', [
            'usulan_peralatans' => $usulanPeralatan
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
     * @param  \App\Http\Requests\StoreUsulanPeralatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsulanPeralatanRequest $request)
    {
        $kompeten = Kompeten::find($request->kompeten_id);
        // return($request);
        if($kompeten->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'kompeten_id' => 'required',
                'peralatan_id' => 'nullable',
                'nama_peralatan' => 'string|nullable',
                'kategori' => 'required',
                'jml' => 'required',
                'proposal' => 'required|mimes:pdf|file|max:5120'
            ]);
            
            $validatedData['keterangan'] = 'Proses Pengajuan';
            $validatedData['proposal'] = $request->file('proposal')->store('proposal-usulan-peralatan');
            $validatedData['profil_id'] = Auth::user()->profil_id;

            UsulanPeralatan::create($validatedData);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Membuat Usulan Peralatan' . $kompeten->komli->kompetensi);

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsulanPeralatan  $usulanPeralatan
     * @return \Illuminate\Http\Response
     */
    public function show(UsulanPeralatan $usulanPeralatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsulanPeralatan  $usulanPeralatan
     * @return \Illuminate\Http\Response
     */
    public function edit(UsulanPeralatan $usulanPeralatan)
    {
        $kompeten = Kompeten::find($usulanPeralatan->kompeten_id);
        $peralatansOptions = Peralatan::where('komli_id', $kompeten->komli_id)->get();
        return view('peralatan-sekolah.edit', [
            'peralatanOptions' => $peralatansOptions,
            'data' => $usulanPeralatan,
            'kompils' => Kompeten::getKompeten(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsulanPeralatanRequest  $request
     * @param  \App\Models\UsulanPeralatan  $usulanPeralatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsulanPeralatanRequest $request, UsulanPeralatan $usulanPeralatan)
    {
        if($usulanPeralatan->profil_id = Auth::user()->profil_id){
            $validatedData = $request->validate([
                'peralatan_id' => 'nullable',
                'nama_peralatan' => 'string|nullable',
                'kategori' => 'required',
                'jml' => 'required',
                'proposal' => 'mimes:pdf|file|max:5120'
            ]);

            if($request->file('proposal')){
                if($usulanPeralatan->proposal){
                    Storage::delete($usulanPeralatan->proposal);
                }
                $validatedData['proposal'] = $request->file('proposal')->store('proposal-usulan-peralatan');
            }

            $kompeten = Kompeten::find($usulanPeralatan->kompeten_id);  
            
            $usulanPeralatan->update($validatedData);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah Usulan Peralatan' . $kompeten->komli->kompetensi);

            return redirect('/peralatan-sekolah/' . $kompeten->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsulanPeralatan  $usulanPeralatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsulanPeralatan $usulanPeralatan)
    {
        if($usulanPeralatan->profil_id == Auth::user()->profil_id){
            Storage::delete($usulanPeralatan->proposal);
            UsulanPeralatan::destroy($usulanPeralatan->id);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Membatalkan usulan peralatan');

            return redirect()->back();
        }else{
            abort(403);
        } 
    }
}
