<?php

namespace App\Http\Livewire\App;

use App\Models\User;
use Livewire\Component;

class UserBio extends Component
{
    public $user;
    public function mount(User $user)
    {
      $this->user = $user;
    }
    public function render()
    {
        return view('livewire.app.user-bio');
    }
     //recibo
     public function openReceived($id)
     {
         $this->emit('openReceived', $id);
     }
}
