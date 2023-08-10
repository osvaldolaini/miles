<?php

namespace App\Http\Livewire\App;

use App\Models\User;
use Livewire\Component;

class FavoritePassenger extends Component
{
    public $showModalCreate = false;
    public $favorites;
    public function mount(User $user)
    {
        $this->favorites = $user->passengers;
        dd($this->favorites);
    }
    public function render()
    {
        return view('livewire.app.favorite-passenger');
    }

    public function showModalCreate()
    {
        $this->showModalCreate = true;
    }
}

