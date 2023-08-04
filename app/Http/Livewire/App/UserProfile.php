<?php

namespace App\Http\Livewire\App;

use Livewire\Component;

class UserProfile extends Component
{

    // Define o layout a ser usado
    protected $layout = 'app-user';
    public function render()
    {
        return view('livewire.app.user-profile');
    }
}
