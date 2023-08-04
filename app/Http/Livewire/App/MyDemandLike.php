<?php

namespace App\Http\Livewire\App;


use App\Models\Demands;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MyDemandLike extends Component
{
    public $data;
    public function mount()
    {
        $this->data = Auth::user()->like;
    }
    public function render()
    {
        return view('livewire.app.my-demand-like');
    }
}
