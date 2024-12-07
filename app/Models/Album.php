<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function artiste(){
        return $this->belongsTo(Artiste::class,"id_artiste");
    }
}
