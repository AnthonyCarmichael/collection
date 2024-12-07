<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liste extends Model
{
    public function chansons()
    {
        return $this->belongsToMany(Chanson::class);
    }
}
