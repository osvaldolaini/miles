<?php

namespace App\Http\Livewire\App;


use App\Models\Demands;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DemandList extends Component
{
    public $demands;
    public $breadcrumb;
    public $model_id;
    public $showDeleteModal = false;

    public $takeLimit = 3;
    public $totalRecords;
    public function takeMore()
    {
        $this->takeLimit += 1;
    }

    protected $listeners = ['echo:demand,DemandHasBeenCreated' => '$refresh'];

    public $readyToLoad = false;

    public function loadPosts()
    {
        // sleep(0.3);
        $this->readyToLoad = true;
        $this->demands = Demands::where('status', 1)
        ->orderBy('id', 'desc')
        ->where('user_id', '!=', Auth::user()->id)
        ->where('end_date','>=',date('Y-m-d H:i:s'))
        ->limit($this->takeLimit)
        ->get();
    }
    public function mount()
    {
        $this->breadcrumb = 'Balcão de pedidos';
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
