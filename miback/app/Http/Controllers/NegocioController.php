<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use App\Http\Requests\StoreNegocioRequest;
use App\Http\Requests\UpdateNegocioRequest;
use App\Models\User;
use Illuminate\Http\Request;

class NegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responsea
     */
    public function index(Request $request)
    {
//        return User::where('id',$request->user()->id)->with('negocios')->get()->first();
        return response()->json([
            "user"=>User::where('id',$request->user()->id)->with('negocios')->get()->first(),
//            "negocios"=>Negocio::where('user_id',$request->user()->id)->get()
        ],200);
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
     * @param  \App\Http\Requests\StoreNegocioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNegocioRequest $request)
    {
        $negocio=Negocio::create($request->all());
        $user=User::find($request->user()->id);
        $user->minegocio=$negocio->id;
        $user->save();
        return $negocio;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Negocio  $negocio
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        return Negocio::where('user_id',$user_id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Negocio  $negocio
     * @return \Illuminate\Http\Response
     */
    public function edit(Negocio $negocio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNegocioRequest  $request
     * @param  \App\Models\Negocio  $negocio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNegocioRequest $request, Negocio $negocio)
    {
        $negocio->update($request->all());
        return $negocio;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Negocio  $negocio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Negocio $negocio)
    {
        //
    }
}
