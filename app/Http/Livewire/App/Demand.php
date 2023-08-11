<?php

namespace App\Http\Livewire\App;

use App\Models\AccountCategory;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

use Livewire\Component;

class Demand extends Component
{
    public $user_id;
    public $showModalCreate = false;
    public $alertSession = false;
    public $rules;

    public $breadcrumb;
    public $miles;
    public $qtd;
    public $value;
    public $value_max;
    public $end_date;
    public $plans;
    public $account_categorie_id;
    public $demands = [];

    public function mount()
    {
        $this->demands = Session::put('demands');
        $this->demands = Session::forget('demands');
        $this->breadcrumb = 'Fazer pedido';
        $this->plans = AccountCategory::select('title','id')->orderBy('title','asc')->where('active',1)->get();
    }
    //Ressetar as inputs
    public function resetAll()
    {
        $this->reset(
            'miles',
            'qtd',
            'value',
            'value_max',
            'account_categorie_id'
        );
    }
    public function render()
    {

        if (Gate::allows('profile-user')) {
            abort(403);
        }
        return view('livewire.app.demand');
    }

    public function showModalCreate()
    {
        $this->showModalCreate = true;
    }

    public function store()
    {
        $this->rules = [
            'value_max' => 'required|max:5',
            'value' => 'required|max:5',
            'miles' => 'required',
            'qtd' => 'required',
            'account_categorie_id' => 'required',
        ];
        $this->validate();

        $demands =[
                'value_max' => $this->value_max,
                'value'     => $this->value,
                'miles'     => $this->miles,
                'end_date'  => $this->end_date,
                'qtd'       => $this->qtd,
                'account_categorie_id'   => $this->account_categorie_id,
        ];
        Session::put('demands', $demands);
        $this->showModalCreate = false;
        return redirect()->route('demand.pass');
    }
}
