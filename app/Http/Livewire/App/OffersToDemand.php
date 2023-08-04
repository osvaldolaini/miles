<?php

namespace App\Http\Livewire\App;

use App\Models\Demands;
use App\Models\Offers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

use Livewire\Component;

class OffersToDemand extends Component
{
    public $demand;
    public $offers;
    public $linkOffer = false;
    public $user_id;

    public function mount(Demands $demand,$linkOffer)
    {
        $this->user_id = Auth::user()->id;
        $this->demand = $demand;
        $this->linkOffer = $linkOffer;
        $this->offers = Offers::where('demand_id',$demand->id)->orderBy('value','asc')->paginate(10);
    }
    public function render()
    {
        $this->offers = $this->demand->offers->sortByDesc('value');
        return view('livewire.app.offers-to-demand');
    }
}
