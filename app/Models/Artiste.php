<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artiste extends Model
{
    public function albums()
    {
        return $this->hasMany(Album::class,"id_artiste","id_artiste");
    }
}
