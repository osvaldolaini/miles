<?php

namespace App\Http\Livewire\Homepage;

use Livewire\Component;

class Seo extends Component
{

    public $meta_description = "SisteMilhas é um local onde o usuário pode negociar suas millhas, fazendo ofertas e gerando demandas de milhas.";
    public $meta_tags = "milhas, gestão de milhas, oferta de milhas, venda de milhas, vender milhas, negociar";

    protected $listeners = ['changeSeo' => 'changeSeo'];

    //recibo
    public function changeSeo($dataPage)
    {
        dd($dataPage);
    }

    public function render()
    {

        return view('livewire.homepage.seo');
    }

}
