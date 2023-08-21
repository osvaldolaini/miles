<?php

namespace App\Http\Livewire\App;

use App\Models\DemandPassenger;
use App\Models\User;
use Livewire\Component;

class FavoritePassenger extends Component
{
    public $showFavotitesModel = false;
    public $favorites;
    public $order;
    public $pass_id;
    public $cpf;
    public $name;
    public $passenger;

    public function mount(DemandPassenger $passenger)
    {
        $this->passenger = $passenger;
        $this->name = $passenger->name;
        $this->cpf = $passenger->cpf;
        $this->favorites = $passenger->demand->user->passengers->where('cpf','!=','')->unique('cpf');
    }
    public function render()
    {
        return view('livewire.app.favorite-passenger');
    }
    public function updateName()
    {
        $this->passenger->name = $this->name;
        $this->passenger->save();
    }
    public function updateCpf()
    {
        $this->passenger->cpf = $this->cpf;

        $this->passenger->save();
        $this->emit('updatePassengers');
    }


    public function showFavotitesModel()
    {
        $this->showFavotitesModel = true;
    }
    public function checkbox($item)
    {
        $this->cpf = $item['cpf'];
        $this->name = $item['name'];
        $this->showFavotitesModel = false;
    }

}

