<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Kompeten;

class RegisteredUserController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:view_users|add_users|edit_users|delete_users', ['only' => ['index','store']]);
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
            return redirect('/cadisdik/'    . $user->kcd->id);
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

    public function create_pengawas(Request $request){
        dd($request);
    }
}
