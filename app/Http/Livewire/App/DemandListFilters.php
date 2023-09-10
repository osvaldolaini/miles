<?php

namespace App\Http\Livewire\App;

use App\Models\Demands;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DemandListFilters extends Component
{
    public $demands;
    public $breadcrumb;
    public $model_id;
    public $showDeleteModal = false;

    public $categories;

    public $categoriesSelecteds = [];
    public $oldSelecteds = [];
    public $min_val;
    public $max_val;

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
        ->whereBetween('value', [$this->min_val, $this->max_val])
        ->whereIn('account_categorie_id', $this->categoriesSelecteds)
        // ->limit($this->takeLimit)
        ->get();
    }
    public function mount()
    {
        if (isset($_GET['max_value'])) {
            $this->max_val = str_replace(".", ",", $_GET['max_value']);
        }
        if (isset($_GET['min_value'])) {
            $this->min_val = str_replace(".", ",", $_GET['min_value']);
        }
        if (isset($_GET['categorias'])) {
            $cats = explode(',',$_GET['categorias']);
            for ($i=0; $i < count($cats); $i++) {
                $this->categoriesSelecteds[] = $cats[$i];
                $this->oldSelecteds[] = $cats[$i];
            }
        }
        $this->breadcrumb = 'Balcão de pedidos';

        // dd($this->categoriesSelecteds);
        $this->demands = Demands::where('status', 1)
        ->orderBy('id', 'desc')
        ->where('user_id', '!=', Auth::user()->id)
        ->where('end_date','>=',date('Y-m-d H:i:s'))
        ->whereBetween('value', [$this->min_val, $this->max_val])
        ->whereIn('account_categorie_id', $this->categoriesSelecteds)
        // ->limit($this->takeLimit)
        ->get();
    }

    public function render()
    {
        return view('livewire.app.demand-list-filters');
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
