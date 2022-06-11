<?php

namespace App\Http\Controllers;

use App\Models\Kompeten;
use App\Models\Komli;
use App\Models\Log;
use App\Models\Profil;
use App\Http\Requests\StoreKompetenRequest;
use App\Http\Requests\UpdateKompetenRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KompetenController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_kompetens|add_kompetens|edit_kompetens|delete_kompetens', ['only' => ['index','show ']]);
         $this->middleware('permission:add_kompetens', ['only' => ['create','store']]);
         $this->middleware('permission:edit_kompetens', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_kompetens', ['only' => ['destroy']]);
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
    public function create($id)
    {
        $komli = Komli::all();
        $profilKomli = Profil::where('id', $id)->get()[0];

        return view('jeniskompeten.create', [
            'profil_id' => $id,
            'komlis' => $komli,
            'profilKompetens' => $profilKomli->kompeten
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKompetenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKompetenRequest $request)
    {
        if($request->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'profil_id' => 'required',
                'jurusanTerpilih' => 'required'
            ]);
    
            // dd(Auth::user());
            // dd($request);
    
            foreach($request->jurusanTerpilih as $kom){
                Kompeten::create([
                    'profil_id' => Auth::user()->profil_id,
                    'komli_id' => $kom,
                    'jml_lk' => 0,
                    'jml_pr' => 0,
                    'kondisi_ideal_ruang' => 0,
                    'kondisi_ideal_lahan' => 0,
                    'ketersediaan' => 0,
                    'kekurangan' => 0,
                    'status' => 'ideal'
                ]);
            }
    
            $profil = Profil::where('id', $request->profil_id)->get()[0];
    
            $jml_lk = 0;
            $jml_pr = 0;
            foreach($profil->kompeten as $kopetensi){
                $jml_lk += $kopetensi->jml_lk;
                $jml_pr += $kopetensi->jml_pr;
            }
    
            $updateData = [
                'jml_siswa_l' => $jml_lk,
                'jml_siswa_p' => $jml_pr
            ];
    
            Profil::where('id', $request->profil_id)->update($updateData);
            $jml_lk = 0;
            $jml_pr = 0;
    
            Log::createLog($request->profil_id, Auth::user()->id, 'Menambahkan ' . count($request->jurusanTerpilih) . ' jurusan');
    
            return redirect('/profil/' . $request->profil_id)->with('success', 'Berhasil menambah jurusan!');
        }else{
            abort(403);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kompeten  $kompeten
     * @return \Illuminate\Http\Response
     */
    public function show(Kompeten $kompeten)
    {
        if($kompeten->profil_id == Auth::user()->profil_id){
            return view('bangunan.praktik.show', [
                'kompeten' => $kompeten,
                'komli' => $kompeten->komli,
                'kompils' => Kompeten::getKompeten()
            ]);
        }else{
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kompeten  $kompeten
     * @return \Illuminate\Http\Response
     */
    public function edit(Kompeten $kompeten, $id)
    {
        // $kompetens = Profil::where('id', $id)->get()[0]->kompeten;
        // $komli = [];

        // foreach($kompetens as $kompeten){
        //     $komli[] = $kompeten->komli;
        // }

        // return view('jeniskompeten.edit', [
        //     'kompetens' => $kompetens,
        //     'komlis' => $komli,
        //     'profil_id' => $id
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKompetenRequest  $request
     * @param  \App\Models\Kompeten  $kompeten
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKompetenRequest $request, Kompeten $kompeten)
    {
        // dd($request);
        if($request->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'profil_id' => 'required',
                'id_kopetensi' => 'required',
                'jml_lk' => 'required',
                'jml_pr' => 'required'
            ]);
    
            foreach($request->id_kopetensi as $key => $kopetensi){
                Kompeten::where('profil_id', $request->profil_id)->where('id', $kopetensi)->update([
                    'jml_lk' => $request->jml_lk[$key],
                    'jml_pr' => $request->jml_pr[$key],
                ]);
            }   
    
            $profil = Profil::where('id', $request->profil_id)->get()[0];
    
            $jml_lk = 0;
            $jml_pr = 0;
            foreach($profil->kompeten as $kopetensi){
                $jml_lk += $kopetensi->jml_lk;
                $jml_pr += $kopetensi->jml_pr;
            }
    
            $updateData = [
                'jml_siswa_l' => $jml_lk,
                'jml_siswa_p' => $jml_pr
            ];
    
            Profil::where('id', $request->profil_id)->update($updateData);
            $jml_lk = 0;
            $jml_pr = 0;
            Log::createLog($request->profil_id, Auth::user()->id, 'Mengubah jumlah siswa');
    
            return redirect('/profil/' . $request->profil_id)->with('success', 'Berhasil mengubah jumlah siswa');
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kompeten  $kompeten
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kompeten $kompeten)
    {
        // dd($kompeten);
        if($kompeten->profil_id == Auth::user()->profil_id){
            Kompeten::destroy($kompeten->id);
    
            $profil = Profil::where('id', $kompeten->profil_id)->get()[0];
    
            $jml_lk = 0;
            $jml_pr = 0;
            foreach($profil->kompeten as $kopetensi){
                $jml_lk += $kopetensi->jml_lk;
                $jml_pr += $kopetensi->jml_pr;
            }
    
            $updateData = [
                'jml_siswa_l' => $jml_lk,
                'jml_siswa_p' => $jml_pr
            ];
    
            Profil::where('id', $kompeten->profil_id)->update($updateData);
            $jml_lk = 0;
            $jml_pr = 0;
    
            $komli = Komli::where('id', $kompeten->komli_id)->get()[0];
    
            Log::createLog($kompeten->profil_id, Auth::user()->id, 'Menghapus jurusan ' . $komli->kompetensi);
    
            return redirect('/profil/' . $kompeten->profil_id)->with('success', 'Berhasil menghapus jurusan!');
        }else{
            abort(403);
        }
    }

    public function updateKetersediaan(Request $request, $id){
        $data = Kompeten::where('id', $id)->get()[0];

        if($data->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'ketersediaan' => 'required',
            ]);

            $data->update([
                'ketersediaan' =>  ($request->ketersediaan == 0) ? 0 : ltrim($request->ketersediaan, '0'),
                'status' => ($request->status) ? 'ideal' : 'tidak_ideal'
            ]);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah Ketersediaan Ruang Praktik ' . $data->komli->kompetensi);

            return redirect()->back();

        }else{
            abort(403);
        }
    }


    public function updateKekurangan(Request $request, $id){
        $data = Kompeten::where('id', $id)->get()[0];

        if($data->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'kekurangan' => 'required'
            ]);

            $data->update([
                'kekurangan' =>  ($request->kekurangan == 0) ? 0 : ltrim($request->kekurangan, '0')
            ]);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah kekurangan Ruang Praktik ' . $data->komli->kompetensi);

            return redirect()->back();

        }else{
            abort(403);
        }
    }

    public function uploadLogo(Request $request, $id){
        $data = Kompeten::find($id);
        if($data->profil_id == Auth::user()->profil->id){
            $validatedData = $request->validate([
                'logo' => 'required'
            ]);
            
            if($data->logo){
                Storage::delete($data->logo);
            }
            $validatedData['logo'] = $request->file('logo')->store('logo');
            
            $data->update($validatedData);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah Logo ' . $data->komli->kompetensi);

            return redirect()->back();
        }else{
            abort(403);
        }
    }

    public function tambahKeterangan(Request $request, $id){
        $data = Kompeten::find($id);
        if($data->profil_id == Auth::user()->profil->id){
            $validatedData = $request->validate([
                'keterangan' => 'required'
            ]);
            
            $data->update($validatedData);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah Keterangan ' . $data->komli->kompetensi);

            return redirect()->back();
        }else{
            abort(403);
        }
    }

    public function updateKondisiIdealRuang(Request $request, $id){
        $data = Kompeten::where('id', $id)->get()[0];
        if($data->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'kondisi_ideal_ruang' => 'required'
            ]);

            $data->update([
                'kondisi_ideal_ruang' =>  ($request->kondisi_ideal_ruang == 0) ? 0 : ltrim($request->kondisi_ideal_ruang, '0')
            ]);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah Kondisi Ideal Ruang Praktik ' . $data->komli->kompetensi);

            return redirect()->back();

        }else{
            abort(403);
        }
    }

    public function updateKondisiIdealLahan(Request $request, $id){
        $data = Kompeten::where('id', $id)->get()[0];
        if($data->profil_id == Auth::user()->profil_id){
            $validatedData = $request->validate([
                'kondisi_ideal_lahan' => 'required'
            ]);

            $data->update([
                'kondisi_ideal_lahan' =>  ($request->kondisi_ideal_lahan == 0) ? 0 : ltrim($request->kondisi_ideal_lahan, '0')
            ]);

            Log::createLog(Auth::user()->profil_id, Auth::user()->id, 'Mengubah Kondisi Ideal Lahan Ruang Praktik ' . $data->komli->kompetensi);

            return redirect()->back();

        }else{
            abort(403);
        }
    }
}
