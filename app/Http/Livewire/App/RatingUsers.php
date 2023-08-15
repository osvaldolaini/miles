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
    public $offer;
    public $rated;
    public $text;
    public $rate = 5;

    public $showModalCreate = false;
    public function mount(Demands $demands,$rated)
    {
        $this->demand       = $demands;
        $this->offer        = $demands->offer;
        $this->rated        = $rated;
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
        // dd($this->rated);
        $r = RatingUser::create([
            'text'      => $this->text,
            'rate'      => $this->rate,
            'demand_id' => $this->demand->id,
            'offer_id'  => $this->offer->id,
            'user_id'   => Auth::user()->id,
            'evaluted'  => $this->rated,
            'code'      => Str::uuid(),
        ]);
        if (Auth::user()->id == $this->demand->user_id) {
            if ($r) {
                $this->demand->status = 3;
                $this->demand->save();
            }
            return redirect()->route('demand.pass');
        } else {
            if ($r) {
                $this->offer->status = 3;
                $this->offer->save();
            }
            return redirect()->route('offer.list.user');
        }


        $this->openAlert('success', 'Avaliação realizada com sucesso.');

        $this->showModalCreate = false;
        // return redirect()->route('demand.user');
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
