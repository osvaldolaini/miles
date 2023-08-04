<?php

namespace App\Http\Livewire\App;

use App\Models\Demands;
use Livewire\Component;

class Dashboard extends Component
{

    public $alertSession = false;
    //Fecha a caixa da mensagem
    public function closeAlert()
    {
        $this->alertSession = false;
    }
    public function render()
    {
        return view('livewire.app.dashboard');
    }

}
