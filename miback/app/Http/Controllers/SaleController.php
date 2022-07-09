<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Producto;
use App\Models\Sale;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }
    public function consultSale(Request $request){
        return Sale::with('details')
            ->with('cliente')
            ->with('provider')
            ->where('negocio_id',$request->user()->minegocio)
            ->whereDate('fecha','>=',$request->desde)
            ->whereDate('fecha','<=',$request->hasta)
            ->orderBy('id','desc')
            ->get();
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
     * @param  \App\Http\Requests\StoreSaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleRequest $request)
    {
        $num=Sale::where('negocio_id',$request->negocio_id)->get()->count()+1;
        $sale=new Sale();
        $sale->num=$num;
        $sale->fecha=date('Y-m-d');
        $sale->hora=date('H:i:s');
        $sale->concepto=$request->concepto==null?'Transacción '.$num:$request->concepto;
        $sale->medio=$request->medio;
        $sale->valor=$request->valor;
        $sale->tipo=$request->tipo;
        $sale->cliente_id=$request->cliente_id;
        $sale->provider_id=$request->provider_id;
        $sale->negocio_id=$request->negocio_id;
        $sale->user_id=$request->user()->id;
        $sale->save();
        $data=[];
        foreach ($request->productos as $r){
            $d=[
                "cantidad"=>$r['cantidadVenta'],
                "precio"=>$r['precioVenta'],
                "subtotal"=>$r['cantidadVenta']*$r['precioVenta'],
                "sale_id"=>$sale->id,
                "producto_id"=>$r['id'],
            ];
            $producto=Producto::find($r['id']);
            $producto->cantidad=$producto->cantidad-$r['cantidadVenta'];
            $producto->save();
            array_push($data, $d);
        }
        Detail::insert($data);
        return $sale;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaleRequest  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $sale->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
