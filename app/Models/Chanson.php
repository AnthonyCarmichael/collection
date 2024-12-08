<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chanson extends Model
{

    use HasFactory;

    // Ajoute 'idDossier' à la propriété fillable
    protected $fillable = [
        'no',
        'nom',
        'duree',
        'filePath',
        'parole',
        'id_album',
        'id_langue',
        'id_genre',
        'id_collection',

    ];

    protected $primaryKey = 'id_chanson'; // Remplacez par la clé primaire réelle


    public function listes()
    {
        return $this->belongsToMany(Liste::class);
    }
    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function album()
    {
        return $this->belongsTo(Album::class, 'id_album', 'id_album');
    }
}
