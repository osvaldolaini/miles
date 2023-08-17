<?php

namespace App\Http\Livewire\App;

use App\Models\Demands;
use Livewire\Component;

class DemandView extends Component
{
    public $dataPage = [];
    public $demand;
    public function mount(Demands $demand)
    {
        $this->demand = $demand;
        $this->dataPage = [
            'user'      => $demand->user->name,
            'title'     => 'Solicitação de '.$demand->milesConvert. ' milhas da '. $demand->category->title,
            'category'  => $demand->category->title,
            'create_at' => 'Criado à '.$demand->timeCreate,
            'url'       => route('demand.view', [$demand->code]),
        ];

    }
    public function render()
    {
        return view('livewire.app.demand-view');
    }
}
