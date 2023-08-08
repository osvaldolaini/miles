<?php

namespace App\Http\Livewire\App;

use App\Events\DemandHasBeenCreated;
use App\Models\Demands;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

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

    public function mount()
    {
        $this->user_id = Auth::user()->id;
        $this->breadcrumb = 'Fazer pedido';
    }
    //Ressetar as inputs
    public function resetAll()
    {
        $this->reset(
            'miles',
            'qtd',
            'value',
            'value_max'
        );
    }
    public function render()
    {
        //Redireciona para a escolha do curso
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
        ];
        $this->validate();

        Demands::create([
            'value_max' => $this->value_max,
            'value'     => $this->value,
            'miles'     => $this->miles,
            'end_date'  => $this->end_date,
            'qtd'       => $this->qtd,
            'user_id'   => $this->user_id,
            'status'    => 1,
            'code'      => Str::uuid(),
        ]);

        DemandHasBeenCreated::dispatch();

        $this->openAlert('success','Pedido efetuado com sucesso.');

        $this->alertSession = true;
        $this->showModalCreate = false;
        return redirect()->route('demand.user');
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
