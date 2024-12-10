<?php

namespace App\Livewire;

use File;
use Livewire\Component;
use Livewire\Livewire;
use Spatie\LivewireFilepond\WithFilePond;

class FileUpload extends Component
{
    use WithFilePond;
    
    public $files = [];

    public function save()
    {
        foreach ($this->files as $file) {
            // Récupérer le nom original du fichier
            $originalFileName = $file->getClientOriginalName();

            // Enregistrer le fichier avec son nom original
            $file->storeAs('uploads', $originalFileName, 'public');
        }
        
        session()->flash('success', 'Album ajouté');
        $this->cleanLivewireTmp();
        return redirect()->route('collections');
        
    }

    protected function cleanLivewireTmp()
    {
        $path = storage_path('app/private/livewire-tmp');
    
        if (File::exists($path)) {
            File::cleanDirectory($path);  // Nettoyer les fichiers
        }
    }

    public function resetPond() {
        $this->files = [];
        $this->dispatch('pondReset');
    }

    public function render()
    {
        return view('livewire.file-upload');
    }
}
