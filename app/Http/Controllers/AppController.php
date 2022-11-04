<?php

namespace App\Http\Controllers;

use App\Models\Model\App\Demand;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index ()
    {
        return view('app.index',[
            'title'     => 'PEDIDOS EM ABERTO',
            'data'      => Demand::with(['user'])
                                ->orderBy('created_at','desc')
                                ->where('end_date','>=',date('Y-m-d H:i:s'))
                                ->get()
        ]);
    }
}
