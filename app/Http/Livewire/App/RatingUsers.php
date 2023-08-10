<?php

namespace App\Http\Livewire\App;

use App\Models\Demands;
use App\Models\RatingUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Illuminate\Support\Str;

class RatingUsers extends Component
{
    public $demand;
    public $offer_id;
    public $rated;
    public $text;
    public $rate;

    public $showModalCreate = false;
    public function mount(Demands $demands,$rated)
    {
        $this->demand = $demands;
        $this->offer_id  = $demands->offer_id;
        $this->rated  = $rated;
    }
    public function render()
    {
        return view('livewire.app.rating-users');
    }
    public function showModalCreate()
    {
        $this->showModalCreate = true;
    }

    public function store()
    {
        RatingUser::create([
            'text'      => $this->text,
            'rate'      => $this->rate,
            'demand_id' => $this->demand->id,
            'offer_id'  => $this->offer_id,
            'user_id'   => $this->rated,
            'evaluted'  => Auth::user()->id,
            'code'      => Str::uuid(),
        ]);
        $this->openAlert('success', 'Avaliação realizada com sucesso.');

        $this->showModalCreate = false;
        return redirect()->route('demand.user');
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
