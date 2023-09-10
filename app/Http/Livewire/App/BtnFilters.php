<?php

namespace App\Http\Livewire\App;

use App\Models\AccountCategory;
use Livewire\Component;

class BtnFilters extends Component
{
    public $showFilterModal = false;
    public $categories;

    public $categoriesSelecteds = [];
    public $oldSelecteds = [];

    public $min_val = '0,00';
    public $max_val = '99,00';

    public function mount()
    {
        // dd($categoriesSelecteds);
        $this->categories = AccountCategory::select('title','id')
        ->orderBy('title','asc')->where('active',1)->get();

        if (isset($_GET['max_value'])) {
            $this->max_val = $_GET['max_value'];
        }
        if (isset($_GET['min_value'])) {
            $this->min_val = $_GET['min_value'];
        }
        if (isset($_GET['categorias'])) {
            $cats = explode(',',$_GET['categorias']);
            for ($i=0; $i < count($cats); $i++) {
                $this->oldSelecteds[] = $cats[$i];
            }
        }
    }
    public function render()
    {
        return view('livewire.app.btn-filters');
    }
    public function openFilter()
    {
        $this->showFilterModal = true;

    }
    public function applayfilters()
    {
        $categories = '';
        if($this->categoriesSelecteds){
            foreach ($this->categoriesSelecteds as $category => $cat) {
                $categories .= $cat.',';
            }
        }
        return redirect('/balcao-com-filtros?max_value='.
        $this->max_val.'&min_value='.
        $this->min_val.'&categorias='.substr($categories, 0, -1));
    }
}
