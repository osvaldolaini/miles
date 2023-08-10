<?php

namespace App\Http\Livewire\App;

use App\Models\Offers;
use Livewire\Component;

use App\Events\DemandHasBeenCreated;

class DemandCheckout extends Component
{
    public $demand;
    public $offer;

    public $showCheckoutModel = false;

    public function mount(Offers $offers)
    {
        $this->demand = $offers->demand;
        $this->offer  = $offers;
    }
    public function render()
    {
        return view('livewire.app.demand-checkout');
    }
    //DELETE
    public function showCheckoutModel()
    {
        $this->showCheckoutModel = true;
    }
    public function checkout()
    {
        $data = $this->demand;
        $data->status = 2;
        $data->offer_id =  $this->offer->id;
        $data->save();

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
