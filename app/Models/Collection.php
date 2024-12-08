<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    // Ajoute 'idDossier' à la propriété fillable
    protected $fillable = [
        'create_at',
        'updated_at',
        'nom',
        'id_user',
    ];

    protected $primaryKey = 'id_collection'; // Remplacez par la clé primaire réelle

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function chansons()
    {
        return $this->hasMany(Chanson::class,"id_collection","id_collection");
    }

    public function artistes() {
        return $this->hasManyThrough(
            Artiste::class, // Le modèle cible (artistes)
            Album::class,   // Le modèle intermédiaire (albums)
            'id_album',     // Clé étrangère dans `chansons` vers `albums` (colonne `id_album` dans chansons)
            'id_artiste',   // Clé étrangère dans `albums` vers `artistes` (colonne `id_artiste` dans albums)
            'id_collection',// Clé primaire dans `collections` (colonne `id_collection`)
            'id_album'      // Clé locale dans `chansons` pointant vers `albums`
      
        );
    }

   
}
