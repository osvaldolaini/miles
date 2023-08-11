<?php

namespace App\Http\Livewire\App;

use App\Models\Demands;
use App\Models\DemandPassenger;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Events\DemandHasBeenCreated;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class DemandPassengers extends Component
{
    public $rules;

    public $showFavotitesModel = false;
    public $showModalCreate = false;
    public $breadcrumb;
    public $miles;
    public $qtd;
    public $value;
    public $value_max;
    public $end_date;
    public $plans;
    public $order;
    public $user;
    public $account_categorie_id;

    public $demands;
    public $passengers;
    public $favorites;

    public $name = [];
    public $cpf = [];

    public function mount()
    {
        $this->breadcrumb = 'Passageiros';
        $this->demands = Session::get('demands');

        $this->value_max = $this->demands['value_max'];
        $this->value = $this->demands['value'];
        $this->miles = $this->demands['miles'];
        $this->end_date = $this->demands['end_date'];
        $this->qtd = $this->demands['qtd'];
        $this->account_categorie_id = $this->demands['account_categorie_id'];
        $this->user = Auth::user();
        $this->favorites = $this->user->passengers->unique('cpf');
        // dd($this->passengers);
    }

    public function render()
    {
        return view('livewire.app.demand-passengers');
    }
    public function showFavotitesModel($order)
    {
        $this->showFavotitesModel = true;
        $this->order = $order;
    }
    public function checkbox($item)
    {
        $this->cpf[$this->order] = $item['cpf'];
        $this->name[$this->order] = $item['name'];
        $this->showFavotitesModel = false;
    }

    public function showModalCreate()
    {
        $this->showModalCreate = true;
    }

    public function store()
    {
        $demand_id = $this->setDemand();
        dd($this->name);
        $count = count($this->name);

        for ($i=0; $i < $count; $i++) {
            if ($this->cpf[$i]) {
                DemandPassenger::create([
                    'name'      => $this->name[$i],
                    'cpf'       => $this->cpf[$i],
                    'user_id'   => Auth::user()->id,
                    'demand_id' => $demand_id,
                    'code'      => Str::uuid(),
                ]);
            }
        }

        $this->openAlert('success', 'Pedido criado com sucesso.');
        $this->showModalCreate = false;
        DemandHasBeenCreated::dispatch();
        return redirect()->route('demand.user');
    }

    public function setDemand()
    {
        $demand = Demands::create([
            'value_max' => $this->value_max,
            'value'     => $this->value,
            'miles'     => $this->miles,
            'end_date'  => $this->end_date,
            'qtd'       => $this->qtd,
            'user_id'   => Auth::user()->id,
            'account_categorie_id'   => $this->account_categorie_id,
            'status'    => 1,
            'code'      => Str::uuid(),
        ]);

        return $demand->id;
    }
    //Fecha a caixa da mensagem
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
