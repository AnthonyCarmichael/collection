<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chanson extends Model
{
    public function listes()
    {
        return $this->belongsToMany(Liste::class);
    }
}
