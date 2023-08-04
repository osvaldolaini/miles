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

    public function mount(Demands $demand)
    {
         //Redireciona para a escolha do curso
         if (Gate::allows('profile-user')) {
            abort(403);
        }
        $this->user_id = Auth::user()->id;
        $this->offers = $demand->offers->sortByDesc('value');
    }
    public function render()
    {
        return view('livewire.app.offers-list');
    }
}
