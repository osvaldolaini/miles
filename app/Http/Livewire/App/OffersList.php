<?php

namespace App\Http\Livewire\App;

use App\Models\Demands;
use App\Models\Offers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Livewire\Component;

class OffersList extends Component
{
    public $offers;
    public $user_id;
    public $breadcrumb;

    public function mount(Demands $demand)
    {
        if (Gate::allows('profile-user')) {
            abort(403);
        }
        $this->user_id = Auth::user()->id;
        $this->offers = $demand->offers->sortBy('value');
        $this->breadcrumb = 'Ofertas';
    }
    public function render()
    {
        return view('livewire.app.offers-list');
    }
}
