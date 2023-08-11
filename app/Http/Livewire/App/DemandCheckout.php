<?php

namespace App\Http\Livewire\App;

use App\Models\Offers;
use Livewire\Component;

use App\Events\DemandHasBeenCreated;

class DemandCheckout extends Component
{
    public $demand;
    public $offer;
    public $favorites;
    public $btn;

    protected $listeners =
    [
        'updatePassengers',
        // ['some-event' => '$refresh']
    ];

    public $showCheckoutModel = false;

    //OPEN MESSAGE
    public function updatePassengers()
    {
        $this->btn    = count($this->demand->passengers->where('cpf',''));

    }

    public function mount(Offers $offers)
    {
        $this->demand = $offers->demand;
        $this->offer  = $offers;
        $this->btn    = count($this->demand->passengers->where('cpf',''));
    }
    public function render()
    {
        return view('livewire.app.demand-checkout',[
            'demand' =>$this->demand
        ]);
    }
    //DELETE
    public function showCheckoutModel()
    {
        $this->showCheckoutModel = true;
    }
    public function checkout()
    {
        // $data = $this->demand;
        $this->demand->status = 2;
        $this->demand->offer_id =  $this->offer->id;
        $this->demand->save();

        DemandHasBeenCreated::dispatch();
        $this->openAlert('success', 'Pedido concluído com sucesso.');

        $this->showCheckoutModel = false;
    }
    public function closeAlert()
    {
        $this->emit('closeAlert');
    }
    //pega o status do registro
    public function openAlert($status, $msg)
    {
        $this->emit('openAlert', $status, $msg);
    }
}
