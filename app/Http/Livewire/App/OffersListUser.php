<?php

namespace App\Http\Livewire\App;

use App\Models\Offers;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class OffersListUser extends Component
{
    use WithPagination;
    public $breadcrumb;
    public function mount()
    {
        $this->breadcrumb = 'Minhas ofertas';
    }
    public function render()
    {
        $offers = Offers::with(['user','demand'])->where('user_id',Auth::user()->id)->orderBy('status','desc')->orderBy('id','desc')->get();

        return view('livewire.app.offers-list-user',
    ['offers'=>$offers]);
    }
}
