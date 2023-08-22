<?php

namespace App\Http\Livewire\App;

use App\Models\Demands;
use App\Models\Offers;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DemandNotification extends Component
{
    public $notification = false;
    public $demands;
    public $breadcrumb;
    public $categories = [];
    public function mount()
    {
        $this->breadcrumb = 'Minhas notificações';

        $userAccounts = Auth::user()->accounts;
        foreach ($userAccounts as $userAccount) {
            $this->categories[]=$userAccount->category->id;
        }
        // if ($this->categories) {
        //     foreach ($this->categories as $key => $value) {
        //         $demand = Demands::select('id','account_categorie_id','user_id')
        //         ->where('status',1)
        //         ->where('user_id', '!=', Auth::user()->id)
        //         ->where('end_date','>=',date('Y-m-d H:i:s'))
        //         ->where('account_categorie_id',$value)->first();
        //         if ($demand != null) {
        //             $this->notification = true;
        //             $this->demands[] = Demands::where('status',1)
        //             ->where('user_id', '!=', Auth::user()->id)
        //             ->where('account_categorie_id',$value)
        //             ->where('end_date','>=',date('Y-m-d H:i:s'))->first();
        //         }
        //     }
        // }
    }
    public function render()
    {
        return view('livewire.app.demand-notification');
    }
    public function compare($demands)
    {
        foreach ($demands as $demand) {
            foreach ($demand->passengers as $passenger) {
                $passa[] = $passenger->cpf;
            }
            $offers[] = Offers::where('account_id',$demand->account_categorie_id)
            ->where('user_id', '!=', Auth::user()->id)
            ->first();
        }

        return array_unique($offers);
    }

    public function compareOffers($demands)
    {
        $offers = Auth::user()->offers->where('status',3);

        foreach ($offers as $offer) {

            foreach ($offer->demand->passengers as $passenger) {
                $passa[] = $passenger->cpf;
            }
        }

        $passa = array_unique($passa);

        foreach ($demands as $demand) {
            foreach ($demand->passengers as $passenger) {
                $passa[] = $passenger->cpf;
            }
        }

        return array_unique($passa);
    }

}
