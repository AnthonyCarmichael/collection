<?php

namespace App\Livewire;

use App\Models\Collection;
use Livewire\Component;

class CollectionComponent extends Component
{
    public $collectionsArr = [];
    
    public function mount() {
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
        $this->dispatch('close-modal', name: 'modalCreateCollection');
        
    }
}
