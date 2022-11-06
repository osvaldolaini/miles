<?php

namespace App\Http\Controllers;

use App\Models\Model\App\Demand;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index ()
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
        return view('app.index',[
            'title'     => 'PEDIDOS EM ABERTO',

            'scripts'   => $scripts,
            'styles'    => $styles,
            'data'      => Demand::with(['user'])
                                ->orderBy('created_at','desc')
                                ->where('status','!=',0)
                                ->where('end_date','>=',date('Y-m-d H:i:s'))
                                ->get()
        ]);
    }
}
