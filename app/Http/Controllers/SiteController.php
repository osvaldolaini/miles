<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function term()
    {
        //$config = Config::get()->first();

        return view('term', [
            'title_postfix' => 'Termo de uso',
            //'config'        =>  $config,
            //'img_jarallax'  =>  'crossfit-canoas-home-1.jpg',
        ]);
    }
    public function politics()
    {
        //$config = Config::get()->first();
        return view('politics', [
            'title_postfix' => 'Política de privacidade',
            //'config'        =>  $config,
            //'img_jarallax'  =>  'crossfit-canoas-home-1.jpg',
        ]);
    }
}
