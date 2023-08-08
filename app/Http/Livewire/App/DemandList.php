<?php

namespace App\Http\Livewire\App;


use App\Models\Demands;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DemandList extends Component
{
    public $demands;
    public $model_id;
    public $showDeleteModal = false;

    protected $listeners = ['echo:demand,DemandHasBeenCreated' => '$refresh'];

    public function mount()
    {
        $this->demands = Demands::where('status', 1)
        ->orderBy('end_date', 'desc')
        ->where('user_id', '!=', Auth::user()->id)
        ->where('end_date','>=',date('Y-m-d H:i:s'))
        ->get();
    }

    public function render()
    {
        return view('livewire.app.demand-list');
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
