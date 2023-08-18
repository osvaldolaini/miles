<?php

namespace App\Http\Livewire\App;

use App\Events\DemandHasBeenCreated;
use App\Models\Demands;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DemandUser extends Component
{
    public $demands;
    public $breadcrumb;
    public $model_id;
    public $showDeleteModal = false;

    public function mount()
    {
        $this->breadcrumb = 'Meus pedidos';
    }
    public function render()
    {
        if (Gate::allows('profile-user')) {
            abort(403);
        }
        $this->demands = Auth::user()->demands
            ->sortByDesc('order')->sortByDesc('end_date');
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
        $data->status = 0;
        $data->save();

        DemandHasBeenCreated::dispatch();
        $this->openAlert('success','Pedido excluido com sucesso.');

        $this->showDeleteModal = false;
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

    //recibo
    public function openReceived($id)
    {
        // dd($id);
        $this->emit('openReceived', $id);
    }

}
