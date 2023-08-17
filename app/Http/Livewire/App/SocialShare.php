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
            route('demand.view', [$demand->code]),
            'Solicitação de '.$demand->milesConvert. ' milhas da '. $demand->category->title,
        )
        ->telegram()
        ->whatsapp()
        ->facebook()
        ->twitter()->getRawLinks();
    }
    public function render()
    {
        return view('livewire.app.social-share',['shareComponent'=>$this->shareComponent]);
    }
}
