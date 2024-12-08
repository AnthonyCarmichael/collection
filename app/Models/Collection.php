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
}
