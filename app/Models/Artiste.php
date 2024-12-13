<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artiste extends Model
{

    use HasFactory;
    public $timestamps = false;
    // Ajoute 'idDossier' à la propriété fillable
    protected $fillable = [
        'nom',
        'folderPath',
        'imgPath',
    ];

    protected $primaryKey = 'id_artiste'; // Remplacez par la clé primaire réelle


    public function albums()
    {
        return $this->hasMany(Album::class,"id_artiste","id_artiste");
    }
}
