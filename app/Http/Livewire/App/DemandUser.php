<?php

namespace App\Http\Livewire\App;

use App\Events\DemandHasBeenCreated;
use App\Models\Demands;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DemandUser extends Component
{
    public $data;
    public $model_id;
    public $showDeleteModal = false;
    public $alertSession = false;
    public function mount()
    {
        $this->data = Auth::user()->demands
        ->sortByDesc('end_date')
        ->where('status',1);
    }
    public function render()
    {
        $this->data = Auth::user()->demands
        ->sortByDesc('end_date')
        ->where('status',1);
        return view('livewire.app.demand-user');
    }
    //DELETE
    public function showDeleteModal($id)
    {
            $this->showDeleteModal = true;
            if (isset($id)) {
                $this->model_id = $id;
            } else {
                $this->model_id = '';
            }

    }
    public function delete()
    {

        $data = Demands::find($this->model_id);
        $data->status=0;
        $data->save();

        DemandHasBeenCreated::dispatch();
        session()->flash('success', 'Pedido excluido com sucesso.');

        $this->alertSession = true;
        $this->showDeleteModal = false;
    }
    //Fecha a caixa da mensagem
    public function closeAlert()
    {
        $this->alertSession = false;
    }
}
