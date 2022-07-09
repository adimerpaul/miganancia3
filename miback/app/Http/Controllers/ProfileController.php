<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Permiso;
use App\Models\User;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
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

    public function listaperfil(Request $request){
        return Profile::with('permisos')->where('negocio_id',$request->negocio_id)->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {
        //
        $profile=new Profile;
        $profile->nombre=strtoupper($request->nombre);
        $profile->negocio_id=$request->negocio_id;
        $profile->save();

        $permisos=Permiso::all();
        foreach ($permisos as $value) {
           DB::SELECT("INSERT into permiso_profile (permiso_id,profile_id,estado) values ($value->id,$profile->id,0)");
        }

        foreach ($request->permisos as $r) {
            DB::SELECT("UPDATE permiso_profile set estado=1 where profile_id=$profile->id and permiso_id=$r");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        //
        $profile=Profile::find($request->id);
        $profile->nombre=strtoupper($request->nombre);
        $profile->save();

        DB::SELECT("UPDATE permiso_profile set estado=0 where profile_id=$request->id ");

        foreach ($request->permisos as $r) {
            DB::SELECT("UPDATE permiso_profile set estado=1 where profile_id=$request->id and permiso_id=$r");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user=User::where('perfil_id',$id)->count();
        if($user==0){
        $profile=Profile::find($id);
        DB::SELECT("DELETE from permiso_profile where profile_id=$id ");
        $profile->delete();
    }
    }
}
