<?php

namespace App\Livewire;

use App\Models\Artiste;
use App\Models\Collection;
use Auth;
use Carbon\Carbon;
use Livewire\Component;

class CollectionComponent extends Component
{
    public $collectionsArr = [];
    public $elementAffiche = [];

    // Form: collection
    public $nom;

    // Collection sélected
    public $collectionSelected;
    
    public function mount() {
        $this->refreshCollections();
    }

    public function refreshCollections() {
        $this->collectionsArr = Collection::all();
    }

    public function render()
    {
        return view('livewire.collection-component');
    }

    public function openModalCreateCollection() {
        $this->dispatch('open-modal', name: 'modalCreateCollection');
        
    }

    public function createCollection() {

        Collection::create([
            'nom' => $this->nom,
            'id_user' => Auth::user()->id
        ]);

        $this->refreshCollections();
        $this->dispatch('close-modal', name: 'modalCreateCollection');
        
    }

    public function selectedCollection($id){
        if ($id) {
            $this->collectionSelected = Collection::find($id);
            $this->elementAffiche = $this->collectionSelected->artistes->unique('id_artiste');
        } 
    }

    public function allCollection() {
        $this->collectionSelected = null;
        $this->elementAffiche = Artiste::whereHas('albums.chansons')->distinct()->get();
    }
}
