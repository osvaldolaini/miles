<?php

namespace App\Http\Livewire\App;

use App\Models\Account;
use App\Models\Demands;
use App\Models\Offers;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class OffersListUser extends Component
{
    use WithPagination;
    public $accounts;
    public $breadcrumb;
    public $offer_id;
    public $passengers;
    public $account_id;
    public $showModalUpdate = false;

    public $rules;

    public function mount()
    {
        $this->breadcrumb = 'Minhas ofertas';
    }
    public function render()
    {
        // $offers = Offers::with(['user','demand'])
        // ->where('user_id',Auth::user()->id)
        // ->orderBy('status','desc')->orderBy('id','desc')->get();

        $offers = Auth::user()->offers
            ->sortByDesc('order')->sortByDesc('end_date');

        return view('livewire.app.offers-list-user',
    ['offers'=>$offers]);
        }
        public function showModalUpdate($id)
        {
            $this->offer_id = $id;
            $o = Offers::find($id);
            $this->accounts = Account::select('name','id','account_categorie_id')
            ->where('account_categorie_id',$o->demand->account_categorie_id)
            ->where('user_id',Auth::user()->id)
            ->where('status',1)->get();
            $this->passengers = $o->demand->passengers;
            // dd($this->passengers);
            $this->showModalUpdate = true;
        }

    public function update()
    {
        $this->rules = [
            'account_id' => 'required'
        ];
        $this->validate();

        $offer = Offers::updateOrCreate([
            'id' => $this->offer_id,
        ], [
            'status'      => 2,
            'account_id'  => $this->account_id,
        ]);

        Demands::updateOrCreate([
            'id' => $offer->demand_id,
        ], [
            'account_id'  => $this->account_id,
        ]);

        $this->openAlert('success', 'Oferta finalizada com sucesso.');

        $this->showModalUpdate = false;
        // return redirect()->route('app');
    }
    public function closeAlert()
    {
        $this->emit('closeAlert');
    }
    //pega o status do registro
    public function openAlert($status, $msg)
    {
        $this->emit('openAlert', $status, $msg);
    }
     //recibo
     public function openReceived($id)
     {
         $this->emit('openReceived', $id);
     }
}
