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
        $demand = $this->setDemand();
        $count = count($this->name);

        for ($i = 0; $i < $count; $i++) {
            if ($this->cpf[$i] != '') {
                if ($this->validaCPF($this->cpf[$i]) == false) {
                    $this->openAlert('error', 'o CPF '. $this->cpf[$i].' não está correto! ');
                    $this->openAlert('info', 'Nesse momento do pedido você pode deixa o CPF em branco caso você não saiba o correto! ');
                    $this->showModalCreate = false;
                    return;
                }
            }
        }
        for ($i = 0; $i < $count; $i++) {

            DemandPassenger::create([
                'name'      => $this->name[$i],
                'cpf'       => $this->cpf[$i],
                'user_id'   => Auth::user()->id,
                'demand_id' => $demand->id,
                'code'      => Str::uuid(),
            ]);
        }
        $rest = $demand->qtd - $count;
        if ($rest > 0) {
            for ($r = 0; $r < $rest; $r++) {
                DemandPassenger::create([
                    'name'      => '',
                    'cpf'       => '',
                    'user_id'   => Auth::user()->id,
                    'demand_id' => $demand->id,
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
            'miles'     => str_replace( array( ',', '.' ), '', $this->miles),
            'end_date'  => $this->end_date,
            'qtd'       => $this->qtd,
            'user_id'   => Auth::user()->id,
            'account_categorie_id'   => $this->account_categorie_id,
            'status'    => 1,
            'code'      => Str::uuid(),
        ]);

        return $demand;
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

    public function validaCPF($cpf) {

    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;

}

}
