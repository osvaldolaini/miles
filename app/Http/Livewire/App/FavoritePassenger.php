<?php

namespace App\Http\Livewire\App;

use App\Models\DemandPassenger;
use App\Models\User;
use Livewire\Component;

class FavoritePassenger extends Component
{
    public $showFavotitesModel = false;
    public $favorites;
    public $order;
    public $pass_id;
    public $cpf;
    public $name;
    public $passenger;

    public function mount(DemandPassenger $passenger)
    {
        $this->passenger = $passenger;
        $this->name = $passenger->name;
        $this->cpf = $passenger->cpf;
        $this->favorites = $passenger->demand->user->passengers->where('cpf','!=','')->unique('cpf');
    }
    public function render()
    {
        if ($this->passenger->cpf) {
            if ($this->validaCPF($this->passenger->cpf) == false) {
                $this->openAlert('error', 'o CPF ' . $this->passenger->cpf . ' não está correto! ');
                return;
            }
        }
        return view('livewire.app.favorite-passenger');
    }
    public function updateName()
    {
        $this->passenger->name = $this->name;
        $this->passenger->save();
    }
    public function updateCpf()
    {
        $this->passenger->cpf = $this->cpf;
        $this->passenger->save();
        $this->emit('updatePassengers');
    }


    public function showFavotitesModel()
    {
        $this->showFavotitesModel = true;
    }
    public function checkbox($item)
    {
        $this->cpf = $item['cpf'];
        $this->name = $item['name'];
        $this->showFavotitesModel = false;
    }
    public function validaCPF($cpf)
    {

        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }
    //pega o status do registro
    public function openAlert($status, $msg)
    {
        $this->emit('openAlert', $status, $msg);
    }

}

