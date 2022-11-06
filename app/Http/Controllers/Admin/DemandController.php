<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Models\Model\App\Demand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $styles = array(
            'vendor/sweetalert2/sweetalert2.min.css',
        );
        $scripts = array(
            'vendor/sweetalert2/sweetalert2.min.js',
            'assets/js/app_main.js',
            'assets/js/app_crud.js',
        );
        return view('app.demands.list',[
            'title'     => 'MEUS PEDIDOS',
            'scripts'   => $scripts,
            'styles'    => $styles,
            'data'      => Demand::with(['user'])
                                ->orderBy('created_at','desc')
                                ->where('user_id',Auth::user()->id)
                                ->where('status','!=',0)
                                ->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $styles = array(
            'vendor/sweetalert2/sweetalert2.min.css',
        );
        $scripts = array(
            'vendor/sweetalert2/sweetalert2.min.js',
            'assets/js/app_main.js',
            'assets/js/app_crud.js',
            'assets/js/app_masks.js',
        );
        return view('app.demands.form',[
            'title'     => 'NOVO PEDIDO',
            'scripts'   => $scripts,
            'styles'    => $styles,
        ]);
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
            'miles'     => 'required',
            'qtd'       => 'required',
            'value'     => 'required',
            'value_max' => 'required',
            'end_date'  => 'required'
        ]);

        $demand               = new Demand();
        $demand->status       = 1;
        $demand->miles        = str_replace('.', '', $request->miles);
        $demand->qtd          = $request->qtd;
        $demand->value        = Functions::valueDB($request->value);
        $demand->value_max    = Functions::valueDB($request->value_max);
        $demand->end_date     = $request->end_date;
        $demand->user_id      = Auth::user()->id;

        if($demand->save()){
            return response()->json(
                [
                    'success' => true,
                    'location'=> url('meus-pedidos'),
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
     * @param  \App\Models\Model\App\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function show(Demand $demand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\App\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function edit(Demand $demand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\App\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demand $demand)
    {

        $demand->status       = 0;

        if($demand->save()){
            return response()->json(
                [
                    'success' => true,
                    'location'=> url('meus-pedidos'),
                    'message' => 'Excluido com sucesso'
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\App\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demand $demand)
    {
        //
    }
}
