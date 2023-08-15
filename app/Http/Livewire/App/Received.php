<?php

namespace App\Http\Livewire\App;

use App\Models\Demands;
use App\Models\Offers;
use Livewire\Component;

class Received extends Component
{
    public $showModalReceived;
    public $demand;
    public $offers;
    public $winner;
    protected $listeners =
    [
        'closeReceived',
        'openReceived',
    ];
    public function render()
    {
        return view('livewire.app.received');
    }
    //CLOSE MESSAGE
    public function closeReceived()
    {
        $this->showModalReceived = false;
    }
    //OPEN MESSAGE
    public function openReceived($id)
    {
        $this->demand = Demands::find($id);
        $this->offers = $this->demand->offers->where('id','!=',$this->demand->offer_id);
        $this->winner = Offers::find($this->demand->offer_id);
        $this->showModalReceived = true;
    }

}
