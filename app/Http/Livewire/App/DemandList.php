<?php

namespace App\Http\Livewire\App;


use App\Models\Demands;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DemandList extends Component
{
    public $data;
    public $model_id;
    public $showDeleteModal = false;
    public $alertSession = false;
    public function mount()
    {
        $this->data = Demands::where('status', 1)
            ->orderBy('end_date', 'desc')
            ->where('user_id', '!=', Auth::user()->id)
            ->get();
        // $this->data = Demands::where('status',1)->get();
    }
    public function render()
    {
        $this->data = Demands::where('status', 1)
            ->orderBy('end_date', 'desc')->where('user_id', '!=', Auth::user()->id)->get();
        return view('livewire.app.demand-list');
    }
    //DELETE
    public function showDeleteModal($id)
    {
        //Redireciona para a escolha do curso
        if (Gate::allows('profile-user')) {
            abort(403);
        }
        $this->showDeleteModal = true;
        if (isset($id)) {
            $this->model_id = $id;
        } else {
            $this->model_id = '';
        }
    }
    public function delete()
    {
        //Redireciona para a escolha do curso
        if (Gate::allows('profile-user')) {
            abort(403);
        }
        $data = Demands::find($this->model_id);
        $data->status = 0;
        $data->save();

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
