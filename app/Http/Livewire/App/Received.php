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
        dd($this->id);
        $this->demand = Demands::find($id);
        dd($this->demand);
        $this->offers = $this->demand->offers;
        dd($this->demand->offers);
        $this->winner = Offers::find($this->demand->offer_id);
        $this->showModalReceived = true;
    }

}
