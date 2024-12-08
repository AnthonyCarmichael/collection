<?php

namespace App\Livewire;

use App\Models\Album;
use App\Models\Artiste;
use Auth;
use Carbon\Carbon;
use DB;
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

    public function updateFilter() {
    
        $this->albumArr = Album::join('artistes', 'albums.id_artiste', '=', 'artistes.id_artiste')
        ->select('albums.*')
        ->where('artistes.nom', 'like', '%'.addslashes($this->filterArtiste).'%')
        ->where('albums.nom', 'like', '%'.addslashes($this->filterAlbum).'%')
        ->where('albums.annee', 'like', '%'.addslashes($this->filterAnnee).'%')
        ->get();
    }
    
}
