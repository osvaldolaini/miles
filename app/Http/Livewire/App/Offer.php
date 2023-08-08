<?php

namespace App\Http\Livewire\App;

use App\Models\Demands;
use App\Models\Offers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

use Livewire\Component;

class Offer extends Component
{
    public $showModalCreate = false;
    public $alertSession = false;
    public $value;
    public $user_id;

    public $demand;

    protected $rules = [
        'value' => 'required|max:5',
    ];

    public function mount(Demands $demand)
    {
        $this->user_id = Auth::user()->id;
        $this->demand = $demand;
    }
    //Ressetar as inputs
    public function resetAll()
    {
        $this->reset(
            'value'
        );
    }
    public function render()
    {
        return view('livewire.app.offer');
    }
    public function showModalCreate()
    {
         //Redireciona para a escolha do curso
         if (Gate::allows('profile-user')) {
            abort(403);
        }
        $this->showModalCreate = true;
    }

    public function store()
    {

        $this->validate();
        Offers::create([
            'value'     => $this->value,
            'demand_id' => $this->demand->id,
            'user_id'   => $this->user_id,
            'status'    => 1,
            'code'      => Str::uuid(),
        ]);

        session()->flash('success', 'Demanda criada com sucesso');

        $this->alertSession = true;
        $this->showModalCreate = false;
        return redirect()->route('app');
    }
    //Fecha a caixa da mensagem
    public function closeAlert()
    {
        $this->alertSession = false;
    }
}