<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{

    use HasFactory;
    public $timestamps = false;

    // Ajoute 'idDossier' à la propriété fillable
    protected $fillable = [
        'nom',
        'duree',
        'folderPath',
        'imgPath',
        'annee',
        'id_artiste',
    ];

    protected $primaryKey = 'id_album'; // Remplacez par la clé primaire réelle

    public function artiste(){
        return $this->belongsTo(Artiste::class,"id_artiste");
    }

    public function chansons()
    {
        return $this->hasMany(Chanson::class, 'id_album', 'id_album');
    }
}
