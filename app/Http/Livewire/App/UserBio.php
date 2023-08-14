<?php

namespace App\Http\Livewire\App;

use App\Models\User;
use Livewire\Component;

class UserBio extends Component
{
    public function mount(User $user)
    {
        dd($user);
    }
    public function render()
    {
        return view('livewire.app.user-bio');
    }
}
