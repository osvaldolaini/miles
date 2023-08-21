<?php

namespace App\Http\Livewire\App;

use App\Models\Account;
use Livewire\Component;

class AccountPassengers extends Component
{
    public $account;
    public $breadcrumb;
    public $offers;
    public $passengers;
    public function mount(Account $account)
    {
        $this->breadcrumb = 'Passageiros vinculados';
        $this->account  = $account;
        $this->offers   = $this->account->offers->where('status', 3)->sortBy('updated_at');
    }
    public function render()
    {
        return view('livewire.app.account-passengers');
    }
    //recibo
    public function openReceived($id)
    {
        $this->emit('openReceived', $id);
    }
}
