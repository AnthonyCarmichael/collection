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
        ->select('albums.*')  // Sélectionner uniquement les colonnes de la table albums
        ->where('artistes.nom', 'like', '%'.$this->filterArtiste.'%')  // Filtrer par le nom de l'artiste
        ->where('albums.nom', 'like', '%'.$this->filterAlbum.'%')  // Filtrer par le nom de l'album
        ->where('albums.annee', 'like', '%'.$this->filterAnnee.'%')  // Filtrer par l'année de l'album
        ->get();  // Retourne une collection d'objets Album
    }
    
}
