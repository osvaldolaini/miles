<?php

namespace App\Http\Livewire\App;

use Livewire\Component;

class SideBar extends Component
{
    public function render()
    {
        return view('livewire.app.side-bar');
    }
    public function openModalSearch()
    {
        $this->emit('openModalSearch');
    }
}
