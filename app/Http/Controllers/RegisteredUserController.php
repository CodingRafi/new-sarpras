<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Kompeten;
use Illuminate\Support\Facades\File;

class RegisteredUserController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:view_users|add_users|edit_users|delete_users', ['only' => ['index','show']]);
         $this->middleware('permission:add_users', ['only' => ['create','store']]);
         $this->middleware('permission:edit_users', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_users', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::pluck('name','name')->all();
        return view('users.index', compact('roles', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasRole('dinas')) {
            $validatedData = $request->validate([
                'role' => 'required',
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'instansi' => 'required',
                'kota_kabupaten_id' => 'nullable'
            ]);
            
            $validatedData['foto_profil'] = '/img/logo_navbar.png';
            $validatedData['password'] = Hash::make('12345678');
            $validatedData['provinsi'] = 'Jawa Barat';
    
            $user = User::create($validatedData);
            
            if($request->role == 1){
                $user->assignRole('pengawas');
            }else if($request->role == 2){
                $user->assignRole('verifikator');
            }
        
            return redirect('/monitoring');
        }else{
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles;
        return view('users.update',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        $validatedData['password'] = bcrypt('12345678');

        $user->update($validatedData);
    
        if ($user->hasRole('kcd')) {
            return redirect('/cadisdik/'    . $user->kcd->id)->with('success', 'Berhasil mengubah cadisdik!');
        }else{
            return redirect('/monitoring'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/monitoring');
    }

    public function ubah_foto(Request $request){
        if(Auth::user()->logo != '/img/logo_navbar.png'){
            $videoLama = public_path('logo/' . Auth::user()->logo);
            File::delete($videoLama);
        }

        $data = $request->logo;
        $folderPath = "logo/";
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $imageName = uniqid() . '.png';
        $file = $folderPath . $imageName;
        file_put_contents($file, $data);
        
        $user = Auth::user()->update([
            'foto_profil' => $imageName
        ]);

        return redirect('/user-settings');
    }

    public function ubah_email(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|unique:users   '
        ]);

        Auth::user()->update($validatedData);

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function userSettings(){
        return view('userSettings', [
            'kompils' => Kompeten::getKompeten(),
        ]);
    }
}
