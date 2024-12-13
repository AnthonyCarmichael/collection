<?php

namespace App\Livewire;

use App\Models\Album;
use App\Models\Artiste;
use App\Models\Chanson;
use Auth;
use Carbon\Carbon;
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
    public $annee = null;


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
            $this->annee = $fileInfo['tags']['quicktime']['creation_date'][0] ?? null;
        }

    }



    public function save()
    {
        $this->validate();

        // Création de la structure de dossiers
        $nomArtistFormat = preg_replace('/^[\s]+/', '', preg_replace('/[^\w\s_-]/', '_', $this->nomArtiste));  // Enlever les espaces au début et remplacer les caractères illégaux
        $nomAlbumFormat = preg_replace('/^[\s]+/', '', preg_replace('/[^\w\s_-]/', '_', $this->nomAlbum));      // Idem pour l'album
        $destinationPath = "uploads/$nomArtistFormat/$nomAlbumFormat";


        $artiste =Artiste::where('nom',$this->nomArtiste)->first();
        if (!$artiste) {

            $artiste = Artiste::create([
                'nom' => $this->nomArtiste,
                'folderPath' => "uploads/$nomArtistFormat",
                'imgPath' => null
            ]);
        }


        $album = Album::where('nom',$this->nomAlbum)->first();
        if (!$album) {
            $album = Album::create([
                'nom' => $this->nomAlbum,
                'folderPath' => $destinationPath,
                'imgPath' => $this->cover ? $destinationPath . "/" . $this->cover->getClientOriginalName() : null,
                'annee' => $this->annee,
                'id_artiste' => $artiste->id_artiste
            ]);
        } else {
            $album->imgPath = $this->cover ? $destinationPath . "/" . $this->cover->getClientOriginalName() : null;
            $album->save();
        }


        
        foreach ($this->files as $file) {

            $getID3 = new getID3();
            $fileInfo = $getID3->analyze($file->getRealPath());

            $trackNumber = $fileInfo['tags']['quicktime']['track_number'][0] ?? null;
            $nom = $fileInfo['tags']['quicktime']['title'][0] ?? 'Inconnu';
            
            $originalFileName = $file->getClientOriginalName();

            Chanson::create([
                'no' => $trackNumber,
                'nom' => $nom,
                'filePath' => $destinationPath.$originalFileName,
                'duree' => null,
                'parole' => null,
                'id_album' => $album->id_album,
                'id_langue' => null,
                'id_genre' => null,
                'id_user' => Auth::user()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            

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
