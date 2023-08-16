<?php

namespace App\Http\Livewire\App;

use App\Models\User;
use Livewire\Component;

class SearchUser extends Component
{
    public $openModalSearch = false;
    public $users;
    public $inputSearch = '';
    protected $listeners =
    [
        'closeReceived',
        'openModalSearch',
    ];

    public function render()
    {
        if ($this->inputSearch != '') {
            $this->users = User::where('name', 'LIKE', '%' . $this->inputSearch . '%')
            ->limit(10)->get();
        }

        return view('livewire.app.search-user');
    }
    public function openModalSearch()
    {
        $this->openModalSearch = true;
    }
    public function closeModalSearch()
    {
        $this->openModalSearch = false;
    }
}
