<?php

namespace App\Http\Livewire\App;

use App\Models\Demands;
use App\Models\DemandLike;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DemandLikes extends Component
{

    public $like;
    public $demands;

    public function mount(Demands $demands)
    {
        $this->demands = $demands;
    }
    public function render()
    {
        return view('livewire.app.demand-likes');
    }
    public function like($id)
    {
        $this->like = DemandLike::where('demand_id',$id)->where('user_id',Auth::user()->id)->first();

        if($this->like != null){
            $this->like->delete();
        }else{
            $this->like = DemandLike::create([
                'demand_id' => $id,
                'user_id'   => Auth::user()->id,
            ]);
        }
    }
}
