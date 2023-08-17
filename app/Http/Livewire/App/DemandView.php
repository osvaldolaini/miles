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
        $this->demand = $this->demand;
        $this->dataPage = [
            'user'      => $this->demand->user->name,
            'title'     => 'Solicitação de '.$this->demand->milesConvert. ' milhas da '. $this->demand->category->title,
            'category'  => $this->demand->category->title,
            'create_at' => 'Criado à '.$this->demand->timeCreate,
            'url'       => route('demand.view', [$this->demand->code]),
        ];
        // $this->changeSeo();
    }

    public function render()
    {

        return view('livewire.app.demand-view');
    }

}
