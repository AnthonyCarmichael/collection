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
        'updatted_at',
        'nom',
        'id_user',
    ];

    protected $primaryKey = 'id_collection'; // Remplacez par la clé primaire réelle

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
   
}
