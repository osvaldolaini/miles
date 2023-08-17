<?php

namespace App\Http\Livewire\App;

use App\Models\Demands;
use Livewire\Component;

class SocialShare extends Component
{
    public $shareComponent;
    public function mount(Demands $demand)
    {
        $this->shareComponent = \Share::page(
            'Acabei de fazer um pedido de '.$demand->milesConvert.
            ' milhas da' . '
            ' . $demand->category->title.'
            para '.$demand->qtd.'
            '.
            route('demand.view', [$demand->code]),

        )
        ->telegram()
        ->whatsapp()
        ->facebook()
        ->twitter()->getRawLinks();
        //dd($this->shareComponent);
    }
    public function render()
    {
        return view('livewire.app.social-share',['shareComponent'=>$this->shareComponent]);
    }
}
