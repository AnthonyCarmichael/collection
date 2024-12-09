<?php
# désuet non utilisé
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadFolder(Request $request)
    {
        // Vérifier si des fichiers sont téléversés
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                if ($file->isValid()) {
                    // Conserver le nom original du fichier
                    $originalName = $file->getClientOriginalName();

                    // Enregistrer chaque fichier dans un sous-dossier "uploads" sous le disque public
                    $filePath = $file->storeAs('uploads', $originalName, 'public');

                    // Afficher le chemin du fichier
                    echo "Fichier téléversé : " . $filePath . "<br>";
                }
            }

            return "Tous les fichiers ont été téléversés avec succès.";
        }

        return "Aucun fichier n'a été téléversé.";
    }
}
