<?php

namespace App\Http\Livewire\App;

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
    public $pass=[];

    public function mount(User $user,$pass_id)
    {
        $this->favorites    = $user->passengers->unique('cpf');
        $this->order        = $pass_id+1;
        $this->pass_id      = $pass_id;
        // $this->pass = Session::get('passengers');
    }
    public function render()
    {
        return view('livewire.app.favorite-passenger');
    }

    public function showFavotitesModel()
    {
        $this->showFavotitesModel = true;
    }
    public function checkbox($item)
    {
        $this->cpf = $item['cpf'];
        $this->name = $item['name'];

        // $this->pass=[
        //     'name' => $this->name,
        //     'cpf'     => $this->cpf,
        // ];
        // Session::push('passengers', $this->pass);
        $this->showFavotitesModel = false;
    }
}

