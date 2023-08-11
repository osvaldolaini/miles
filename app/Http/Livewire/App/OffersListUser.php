<?php

namespace App\Http\Livewire\App;

use App\Models\Account;
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
    public $account_id;
    public $showModalUpdate = false;
    public function mount()
    {
        $this->breadcrumb = 'Minhas ofertas';
    }
    public function render()
    {
        $offers = Offers::with(['user','demand'])
        ->where('user_id',Auth::user()->id)
        ->orderBy('status','desc')->orderBy('id','desc')->get();
        $this->accounts = Account::select('name','id','account_categorie_id')
        ->where('user_id',Auth::user()->id)
        ->where('status',1)->get();
        return view('livewire.app.offers-list-user',
    ['offers'=>$offers]);
        }
        public function showModalUpdate($id)
        {
            $this->offer_id = $id;
            $this->showModalUpdate = true;
        }

    public function update()
    {
        Offers::updateOrCreate([
            'id' => $this->offer_id,
        ], [
            'status'      => 2,
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
}
