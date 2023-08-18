<?php

namespace App\Http\Livewire\App;

use App\Models\Demands;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DemandNotification extends Component
{
    public $notification = false;
    public $demands;
    public $breadcrumb;
    public function mount()
    {
        $this->breadcrumb = 'Minhas notificações';
        $this->categories = [];

        $userAccounts = Auth::user()->accounts;
        foreach ($userAccounts as $userAccount) {
            $this->categories[]=$userAccount->category->id;
        }
        if ($this->categories) {
            foreach ($this->categories as $key => $value) {
                $demand = Demands::select('id','account_categorie_id','user_id')->where('status',1)
                ->where('user_id', '!=', Auth::user()->id)
                ->where('end_date','>=',date('Y-m-d H:i:s'))
                ->where('account_categorie_id',$value)->first();
                if ($demand != null) {
                    $this->notification = true;
                    $this->demands[] = Demands::where('status',1)
                    ->where('user_id', '!=', Auth::user()->id)
                    ->where('end_date','>=',date('Y-m-d H:i:s'))->first();
                }
            }
        }

    }
    public function render()
    {
        return view('livewire.app.demand-notification');
    }
}
