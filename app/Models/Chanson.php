<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chanson extends Model
{

    use HasFactory;

    public $timestamps = true;
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';

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
        'id_user',
        ''

    ];

    protected $primaryKey = 'id_chanson'; // Remplacez par la clé primaire réelle


    public function listes()
    {
        return $this->belongsToMany(Liste::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function album()
    {
        return $this->belongsTo(Album::class, 'id_album', 'id_album');
    }
}
