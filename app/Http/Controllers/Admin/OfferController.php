<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Models\Model\App\Demand;
use App\Models\Model\App\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
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
     * Display the specified resource.
     *
     * @param  \App\Models\Model\App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function create(Demand $demand)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'value'     => 'required',
        ]);

        $offer               = new Offer();
        $offer->status       = 1;
        $offer->value        = Functions::valueDB($request->value);
        //$offer->miles        = str_replace('.', '', $request->miles);
        $offer->demand_id    = $request->demand_id;
        $offer->user_id      = Auth::user()->id;

        if($offer->save()){
            return response()->json(
                [
                    'success' => true,
                    'location'=> url('ofertas-do-pedido/'.$offer->demand_id),
                    'message' => 'Atualizado com sucesso'
                ]
            );
        }else{
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Erro ao tentar atualizar'
                ]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
