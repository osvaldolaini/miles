<?php

namespace App\Http\Livewire\App;

use Livewire\Component;

class MessageAlert extends Component
{
    public $alertSession;
    protected $listeners =
    [
        'closeAlert',
        'openAlert',
    ];
    public function render()
    {
        return view('livewire.app.message-alert');
    }
    //CLOSE MESSAGE
    public function closeAlert()
    {
        $this->alertSession = false;
    }
    //OPEN MESSAGE
    public function openAlert($status, $msg)
    {
        session()->flash($status, $msg);
        $this->alertSession = true;
    }
}
