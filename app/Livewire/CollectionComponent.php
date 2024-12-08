<?php

namespace App\Livewire;

use App\Models\Album;
use App\Models\Artiste;
use Auth;
use Carbon\Carbon;
use Livewire\Component;

class CollectionComponent extends Component
{

    public $selectedElement = [];
    public $albumArr = [];

    public function mount(){
        $this->albumArr = Album::all();
    }
    
}
