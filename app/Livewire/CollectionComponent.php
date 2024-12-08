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

    //zone filter
    public $filterArtiste = null;
    public $filterAlbum = null;
    public $filterAnnee = null;

    public function mount(){
        $this->albumArr = Album::all();
    }

    public function updatedFilterArtiste($value) {
        dd($value);
    }
    
}
