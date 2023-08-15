<?php

namespace App\Http\Livewire\App;

use App\Models\Account;
use App\Models\AccountCategory;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Accounts extends Component
{
    public $accounts;
    public $model_id;
    public $showDeleteModal = false;

    use WithPagination;
    public $showJetModal = false;
    public $showModalView = false;
    public $showModalCreate = false;
    public $showModalEdit = false;
    public $rules;
    protected $listeners =
    [
        'showModalCreate',
        'showModalRead',
        'showModalUpdate',
        'showModalDelete'
    ];

    public $plans;
    public $registerId;
    public $status;
    public $name;
    public $account_categorie_id;

    public function mount()
    {
        $this->plans = AccountCategory::select('title','id')->where('active',1)->get();
    }
    public function render()
    {
        if (Gate::allows('profile-user')) {
            abort(403);
        }
        return view('livewire.app.accounts');
    }
    //CREATE
    public function showModalCreate()
    {
        $this->showModalCreate = true;
    }
    public function store()
    {
        $this->rules = [
            'name' => 'required|unique:accounts',
        ];
        $this->validate();

        Account::create([
            'name'                  => mb_strtoupper($this->name),
            'status'                => $this->status,
            'account_categorie_id'  => $this->account_categorie_id,
            'user_id'               => Auth::user()->id,
            'status'                => 1,
            'code'                  => Str::uuid(),
        ]);

        $this->openAlert('success', 'Conta criada com sucesso.');

        $this->showModalCreate = false;
        $this->reset('name', 'account_categorie_id');
    }

    //UPDATE
    public function showModalUpdate(Account $accounts)
    {
        $this->model_id = $accounts->id;
        $this->name     = $accounts->name;
        $this->account_categorie_id     = $accounts->account_categorie_id;
        $this->status   = $accounts->status;
        $this->showModalEdit = true;
    }
    public function update()
    {
        $this->rules = [
            'name' => ['required', Rule::unique('accounts')->ignore($this->model_id)],
        ];
        $this->validate();

        Account::updateOrCreate([
            'id' => $this->model_id,
        ], [
            'name'                  => $this->name,
            'status'                => $this->status,
            'account_categorie_id'  => $this->account_categorie_id,
        ]);

        $this->openAlert('success', 'Conta atualizada com sucesso.');

        $this->showModalEdit = false;
        $this->reset('name', 'account_categorie_id');
    }
    //DELETE
    public function showModalDelete($id)
    {
        $this->showJetModal = true;
        if (isset($id)) {
            $this->registerId = $id;
        } else {
            $this->registerId = '';
        }
    }
    public function delete($id)
    {
        $data = Account::where('id', $id)->first();
        $data->status = '2';
        $data->save();
        $this->showJetModal = false;
        $this->openAlert('success', 'Registro excluido com sucesso.');
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
