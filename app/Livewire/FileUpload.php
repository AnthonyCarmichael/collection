<?php

namespace App\Livewire;

use File;
use Livewire\Component;
use Livewire\Livewire;
use Spatie\LivewireFilepond\WithFilePond;
use getID3;

class FileUpload extends Component
{
    use WithFilePond;
    
    public $files = [];
    public $showUpload =false;

    public function save()
    {
        foreach ($this->files as $file) {
            // Récupérer le nom original du fichier
            $getID3 = new getID3();
            $fileInfo = $getID3->analyze($file->getRealPath());


            // Récupération du nom de l'artiste et de l'album
            $artist = $fileInfo['tags']['quicktime']['artist'][0] ?? 'Inconnu';
            $album = $fileInfo['tags']['quicktime']['album'][0] ?? 'Inconnu';


            // Création de la structure de dossiers
            $artist = preg_replace('/[^\w\s]/', '_', $artist); // Nettoyer le nom
            $album = preg_replace('/[^\w\s]/', '_', $album);   // Nettoyer le nom
            $destinationPath = "uploads/$artist/$album";

            $originalFileName = $file->getClientOriginalName();

            // Enregistrer le fichier avec son nom original
            $file->storeAs($destinationPath, $originalFileName, 'public');
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

    public function render()
    {
        return view('livewire.file-upload');
    }
}
