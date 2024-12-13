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

    public $nomAlbum = null;
    public $nomArtiste = null;
    public $cover = null;


    // Règles de validation
    protected $rules = [
        'nomArtiste' => 'required',  // Permet les lettres, chiffres, espaces, tirets et underscores
        'nomAlbum'   => 'required',  // Idem pour l'album

    ];

    protected $messages = [
        'nomArtiste.required' => 'Le nom de l\'artiste est obligatoire.',
        'nomAlbum.required' => 'Le nom de l\'album est obligatoire.',
    ];

    public function updatedFiles()
    {
        $this->processFiles();
    }

    public function processFiles() {

        foreach ($this->files as $file) {
            // Récupérer le nom original du fichier
            $getID3 = new getID3();
            $fileInfo = $getID3->analyze($file->getRealPath());

            if ($fileInfo['fileformat'] == "png" || $fileInfo['fileformat'] == "jpg" || $fileInfo['fileformat'] == "jpeg") {
                $this->cover = $file;
            }
            
            // Récupération du nom de l'artiste et de l'album
            $this->nomArtiste = $fileInfo['tags']['quicktime']['artist'][0] ?? 'Inconnu';
            $this->nomAlbum = $fileInfo['tags']['quicktime']['album'][0] ?? 'Inconnu';
        }

    }



    public function save()
    {
        $this->validate();

        
        foreach ($this->files as $file) {
            // Création de la structure de dossiers
            $artist = preg_replace('/^[\s]+/', '', preg_replace('/[^\w\s_-]/', '_', $this->nomArtiste));  // Enlever les espaces au début et remplacer les caractères illégaux
            $album = preg_replace('/^[\s]+/', '', preg_replace('/[^\w\s_-]/', '_', $this->nomAlbum));      // Idem pour l'album
            $destinationPath = "uploads/$artist/$album";

            $originalFileName = $file->getClientOriginalName();

            // Enregistrer le fichier avec son nom original
            $file->storeAs($destinationPath, $originalFileName, 'public');
        }

        if ($this->cover) {
            $this->cover->storeAs($destinationPath, $this->cover->getClientOriginalName(), 'public');
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

    public function setArtiste($nom){
        $this->nomArtiste = $nom;
    }
}
